export default class ExceptionsTimeSwitcher {

    protected selectEl :HTMLSelectElement;
    protected timeDiv :HTMLDivElement;

    constructor(exceptionBlock :HTMLDivElement) {

        this.selectEl = this.collectSelect(exceptionBlock);
        this.timeDiv = this.collectTimeDiv(exceptionBlock);

        this.selectEl.addEventListener("change", (e) => this.toggleTimeDiv(e));
    }

    toggleTimeDiv(event :Event) {
        const target = event.target as HTMLSelectElement;
        if (!target) throw new Error("Event target is null");

        const dataWorking = target.value;
        if (dataWorking === "true") {
            this.timeDiv.classList.add("flex");
            this.timeDiv.classList.remove("hidden");
        } else {
            this.timeDiv.classList.remove("flex");
            this.timeDiv.classList.add("hidden");
        }
    }

    collectTimeDiv(exceptionBlock :HTMLDivElement) :HTMLDivElement {
        let divEl = exceptionBlock.querySelector<HTMLInputElement>(".exception-time");
        if(divEl instanceof HTMLDivElement) {
            return divEl;
        }
        throw new Error("Time div element is not find");
    }

    collectSelect(exceptionBlock : HTMLDivElement) :HTMLSelectElement {
        let selectElement = exceptionBlock.querySelector<HTMLSelectElement>(`select`)

        if(selectElement) {
            return selectElement;
        }
        throw new Error("Radio is working inputs are not find");
    }

}
