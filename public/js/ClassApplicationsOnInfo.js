class ApplicationsOnInfo {
    constructor(data, parent) {
        this.id = data.id;
        this.data = data;
        this.number = data.number;

        this.parent = parent;

        setInterval(_ => this.parent.checkActive(this.id, this), 3000);
        this.render();
    }

    render() {
        this.el = $(`
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">${this.data.queue.prefix}${this.id}</div>
                    <div class="col-md-6">${this.data.window.number}</div>
                </div>
            </div>
        `);

        $('#info__items').prepend(this.el);
    }
}