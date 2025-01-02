export default class ShopForm
{
    protected button :HTMLButtonElement;
    protected form :HTMLFormElement;

    constructor()
    {
        this.button = this.collectBtn();
        this.form = this.collectForm();
        this.button.addEventListener("click", () => {
            // collect all inputs
            let inputs = this.collectTimeInputs();
            inputs.forEach(input => input.value = input.value + ":00")
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

    collectForm() :HTMLFormElement
    {
        let form = document.getElementById("form-shop");
        if(form && (form instanceof HTMLFormElement)) {
            return form;
        }
        throw new Error("Form is not find");
    }

    collectTimeInputs() :HTMLInputElement[]
    {
        const inputs = document.querySelectorAll<HTMLInputElement>("#working-time input");

        if (inputs.length > 0) {
            return Array.from(inputs);
        }

        throw new Error("Time Inputs are not collected");
    }
}
