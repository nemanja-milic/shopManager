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
        // collect all inputs
        let inputs = this.collectTimeInputs();
        inputs.forEach(input => input.value = input.value + ":00");

        let collectIsWorkingInputs = this.collectIsWorkingElements();
        let hiddenIsWorkingField = document.createElement("input");
        hiddenIsWorkingField.name = "is_working[]";
        hiddenIsWorkingField.value = this.generateIsWorkingField(collectIsWorkingInputs).join(",");
        this.form.appendChild(hiddenIsWorkingField);

        this.form.submit()
    }

    collectBtn() :HTMLButtonElement
    {
        let btn = document.getElementById("button-shop");
        if(btn && (btn instanceof HTMLButtonElement)) {
            return btn;
        }
        throw new Error("Button is not find");
    }

    generateIsWorkingField(collectIsWorkingInputs :HTMLInputElement[]) :Boolean[] {

        let returnArray = [];
        for(let i = 0; i<collectIsWorkingInputs.length; i++) {
            if(collectIsWorkingInputs[i].checked && collectIsWorkingInputs[i].getAttribute("data-working") === "true") {
                returnArray.push(true);
            }
            else if(collectIsWorkingInputs[i].checked && collectIsWorkingInputs[i].getAttribute("data-working") === "false") {
                returnArray.push(false);
            }
        }
        return returnArray
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

        if (workingTimeInputs.length > 0 && exceptionsTimeInputs.length >0) {
            return Array.from([...workingTimeInputs, ...exceptionsTimeInputs]);
        }

        throw new Error("Working Inputs or Exceptions inputs are not collected");
    }

    collectIsWorkingElements() :HTMLInputElement[] {

        let collectIsWorkingInputs = document.querySelectorAll<HTMLInputElement>("#exceptions input[type=radio]");

        if(collectIsWorkingInputs.length > 0) {
            return Array.from([...collectIsWorkingInputs]);
        }
        throw new Error("Is working element are not find");
    }

}
