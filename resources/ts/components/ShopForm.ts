export default class ShopForm
{
    protected button :HTMLButtonElement;
    protected form :HTMLFormElement;

    constructor()
    {
        this.button = this.collectBtn();
        this.form = this.collectForm();
        this.button.addEventListener("click", () => {
            this.form.submit()
        })
    }

    collectBtn() :HTMLButtonElement
    {
        let btn = document.getElementById("button-shop");
        if(btn && (btn instanceof HTMLButtonElement)) {
            return btn;
        }
        throw new Error("Button is not find");
    }

    collectForm()
    {
        let form = document.getElementById("form-shop");
        if(form && (form instanceof HTMLFormElement)) {
            return form;
        }
        throw new Error("Form is not find");
    }
}
