export default class ShopForm
{
    protected button :HTMLButtonElement;
    protected form :HTMLFormElement;

    constructor()
    {
        this.button = this.collectBtn();
        this.form = this.collectForm();
        this.button.addEventListener("click", () => this.submitForm())
    }

    submitForm() {
        let inputs = this.collectTimeInputs();
        inputs.forEach(input => input.value.length === 5 ? input.value = input.value + ":00" : false);

        this.form.submit();
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
        const workingTimeInputs = document.querySelectorAll<HTMLInputElement>("#working_time input");
        const exceptionsTimeInputs = document.querySelectorAll<HTMLInputElement>("#exceptions input[type=time]");

        if (workingTimeInputs.length > 0 || exceptionsTimeInputs.length >0) {
            return Array.from([...workingTimeInputs, ...exceptionsTimeInputs]);
        }

        return Array.from([]);
    }

}
