class Application {
    constructor(data, parent) {
        this.id = data.id;
        this.data = data;
        this.queue = data.queue;
        this.buttons = data.allow_windows;

        this.parent = parent;

        setInterval(_ => this.parent.checkActive(this.id, this), 3000);
        this.render();
        this.bindEvents();
    }

    appointWindow(ev) {
        let window_id = ev.currentTarget.dataset.id;
        let application_id = ev.currentTarget.parentNode.parentNode.dataset.id;

        delete this.parent.objId[this.parent.objId.indexOf(application_id)];

        $.ajax({
            url: 'applications/join',
            data: {
                'window_id': window_id,
                'application_id': application_id
            },
            success: data => {
                $(ev.currentTarget.parentNode.parentNode).hide(1000);
                $('#hash').val(data);
            },
            error: _ => {
                alert('Неуспешно');
            }
        });
    }

    bindEvents() {
        $(this.el).on('click', '.application__btn', ev => this.appointWindow(ev));
    }

    render() {
        let buttons = '';

        this.buttons.forEach(btn => {
            buttons += `<div class="btn btn-primary application__btn" data-id="${btn.id}">${btn.number}</div> `;
        });

        this.el = $(`
        <tr data-id="${this.id}" class="applications__item">
            <td>${this.queue.name} ${this.id}</td>
            <td>
                ${buttons}
            </td>
        </tr>
        `);

        $('#applications__body').append(this.el);
    }
}