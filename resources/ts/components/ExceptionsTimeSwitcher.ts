export default class ExceptionsTimeSwitcher {

    protected yesRadioButton :HTMLInputElement;
    protected noRadioButton :HTMLInputElement;
    protected timeDiv :HTMLDivElement;

    constructor() {

        [this.yesRadioButton, this.noRadioButton] = this.collectRadioButtons();
        this.timeDiv = this.collectTimeDiv();

        this.yesRadioButton.addEventListener("change", (e) => this.toggleTimeDiv(e));
        this.noRadioButton.addEventListener("change", (e) => this.toggleTimeDiv(e));
        this.initSettings();
    }

    initSettings() {
        if(!this.noRadioButton.checked && !this.yesRadioButton.checked) {
            this.noRadioButton.checked = true;
            const event = new Event("change");
            this.noRadioButton.dispatchEvent(event);
        }
    }

    toggleTimeDiv(event :Event) {
        const target = event.target as HTMLElement;
        if (!target) throw new Error("Event target is null");

        const dataWorking = target.getAttribute("data-working");
        if (dataWorking === "true") {
            this.timeDiv.style.display = "flex";
        } else {
            this.timeDiv.style.display = "none";
        }
    }

    collectTimeDiv() :HTMLDivElement {
        let divEl = document.getElementById("exception-time");
        if(divEl instanceof HTMLDivElement) {
            return divEl;
        }
        throw new Error("Time div element is not find");
    }

    collectRadioButtons() :Array<HTMLInputElement> {
        let radioButtonYes = document.getElementById("is_working_yes");
        let radioButtonNo = document.getElementById("is_working_no");

        let returnArray = [];

        if(radioButtonYes instanceof HTMLInputElement) {
            returnArray.push(radioButtonYes);
        }
        else throw new Error("Radio button 'is_working_yes' is not find");

        if(radioButtonNo instanceof HTMLInputElement) {
            returnArray.push(radioButtonNo)
        }
        else throw new Error("Radio button 'is_working_yes' is not find")
        return returnArray;
    }

}
