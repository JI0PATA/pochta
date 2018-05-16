class Sync {
    constructor(ClassObj, RouteName) {
        this.obj = [];
        this.objId = [];

        this.ClassObj = ClassObj;
        this.RouteName = RouteName;

        this.checkHash();
        setInterval(_ => this.checkHash(), 3000);
    }

    checkHash() {
        let prevHash = $('#hash').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: this.RouteName + '/hash',
            success: hash => {
                if (prevHash !== hash) this.check();
            }
        });
    }

    check() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: this.RouteName + '/check',
            type: 'POST',
            data: {
                list: JSON.stringify(this.objId),
            },
            success: data => {
                data = JSON.parse(data);

                $('#hash').val(data['hash']);

                if (data['list'].value !== 0) this.updateList(data['list']);
            }
        });
    }

    updateList(list) {
        list.forEach(item => {
            if (this.objId.includes(item.id)) return;

            this.objId.push(item.id);
            this.obj.push(new this.ClassObj(item, this));
        });
    }

    checkActive(itemId, exemplar) {
        $.ajax({
            url: this.RouteName + '/checkActive/' + itemId,
            success: active => {
                if (parseInt(active) === 0) {
                    delete this.objId[this.objId.indexOf(itemId)];
                    exemplar.el.hide(1000);
                    exemplar.el.remove();
                    delete this.obj[this.obj.indexOf(exemplar)];
                }
            }
        });
    }
}