export default class ExceptionsTimeSwitcher {

    protected yesRadioButton :HTMLInputElement;
    protected noRadioButton :HTMLInputElement;
    protected timeDiv :HTMLDivElement;

    constructor(exceptionBlock :HTMLDivElement) {

        [this.yesRadioButton, this.noRadioButton] = this.collectRadioButtons(exceptionBlock);
        this.timeDiv = this.collectTimeDiv(exceptionBlock);

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

    collectTimeDiv(exceptionBlock :HTMLDivElement) :HTMLDivElement {
        let divEl = exceptionBlock.querySelector<HTMLInputElement>(".exception-time");
        if(divEl instanceof HTMLDivElement) {
            return divEl;
        }
        throw new Error("Time div element is not find");
    }

    collectRadioButtons(exceptionBlock : HTMLDivElement) :Array<HTMLInputElement> {
        let radioBtns = exceptionBlock.querySelectorAll<HTMLInputElement>(`input[type=radio]`)

        if(radioBtns.length > 0) {
            return Array.from([...radioBtns])
        }
        throw new Error("Radio is working inputs are not find");
    }

}
