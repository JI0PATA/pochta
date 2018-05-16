class Queue {
    constructor(data, parent) {
        this.id = data.id;
        this.data = data;

        this.parent = parent;

        setInterval(_ => this.parent.checkActive(this.id, this), 3000);
        this.render();
        this.bindEvents();
    }

    createApplication(ev) {
        let info = JSON.parse(ev.currentTarget.dataset.info);

        let id = info.id;
        let prefix = info.prefix;

        $.ajax({
            url: '/terminal/applications/create/' + id,
            success: data => {
                alert('Ваш номер: ' + prefix + data.id);
            }
        });
    }

    bindEvents() {
        $(this.el).on('click', ev => this.createApplication(ev));
    }

    render() {
        this.el = $(`
           <div class="terminal__item" data-info='{"id":${this.data.id},"prefix":"${this.data.prefix}"}'>${this.data.name}</div>    
        `);

        $('#terminal__items').append(this.el);
    }

}