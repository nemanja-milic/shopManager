import ExceptionsTimeSwitcher from "./ExceptionsTimeSwitcher";

export default class ExceptionsAddDelete
{

    protected mainExceptionDiv :HTMLDivElement;
    protected exceptionBlocks :HTMLDivElement[] | null;
    protected deleteBtns! :HTMLButtonElement[];
    protected addExceptionBtn :HTMLButtonElement;

    constructor() {

        this.mainExceptionDiv = this.collectMainExceptionDiv();
        this.exceptionBlocks = this.collectExceptionsBlock();
        this.addExceptionBtn = this.collectBtnAddExceptionBlock();
        this.deleteBtns = this.collectBtnsForDeletingExceptionBlock();

        this.exceptionBlocks?.forEach(exceptionBlock => new ExceptionsTimeSwitcher(exceptionBlock))
        this.addEvents();
    }

    protected deleteExceptionBlock(event :Event) :void {
        const target = event.target as HTMLButtonElement;
        const parent = target.parentElement?.parentElement;
        if(parent) {
            parent.remove()
            return;
        }
        throw new Error("Parent exception div is not find")
    }

    protected addExceptionBlock() {
        const newExceptionBlock = document.createElement("div");
        newExceptionBlock.className = "exception-block flex gap-3 mt-3";
        newExceptionBlock.innerHTML = `
            <div>
                <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
                <input
                    name="reason[]"
                    type="text"
                    id="reason"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                <input
                    name="date[]"
                    type="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>
            <div class="flex gap-3 flex-col">
                <label class="text-sm font-medium text-gray-900 dark:text-white">Shop is working that day</label>
                <select
                    name="is_working[]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Please choose yes or no</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
            <div class="exception-time hidden items-center gap-2">
                <div>
                    <label for="opening_time">Opening time</label>
                    <input
                        id="opening_time"
                        name="opening_time[]"
                        type="time"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-1 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-800 focus:ring focus:ring-blue-300 dark:focus:ring-blue-500"
                    />
                </div>
                <span class="text-gray-700 dark:text-white">-</span>
                <div>
                    <label for="closing_time">Closing time</label>
                    <input
                        name="closing_time[]"
                        id="closing_time"
                        type="time"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-1 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-800 focus:ring focus:ring-blue-300 dark:focus:ring-blue-500"
                    />
                </div>
            </div>
            <div class="delete-exception-block mt-auto">
                <button type="button" class="btn-red">-</button>
            </div>
        `;
        this.mainExceptionDiv.append(newExceptionBlock);
        this.deleteBtns = this.collectBtnsForDeletingExceptionBlock();
        this.addEvents();
        new ExceptionsTimeSwitcher(newExceptionBlock);
    }

    protected addEvents() {
        this.deleteBtns.forEach(btn => btn.onclick = (e) => this.deleteExceptionBlock(e));
        this.addExceptionBtn.onclick = () => this.addExceptionBlock();
    }

    protected collectMainExceptionDiv() :HTMLDivElement {
        let mainDiv = document.getElementById("exceptions");
        if(mainDiv instanceof HTMLDivElement) {
            return mainDiv;
        }
        throw new Error("Main div is not selected");
    }

    protected collectBtnsForDeletingExceptionBlock() :HTMLButtonElement[] {
        let deleteBtns = document.querySelectorAll<HTMLButtonElement>("#exceptions .delete-exception-block");
        if(deleteBtns.length > 0) {
            return Array.from([...deleteBtns]);
        }
        return Array.from([]);
    }

    protected collectBtnAddExceptionBlock() :HTMLButtonElement {
        let btn = document.getElementById("add-exceptions");
        if(btn && (btn instanceof HTMLButtonElement)) {
            return btn;
        }
        throw new Error("Button for adding the exception is not collected");
    }

    protected collectExceptionsBlock() : HTMLDivElement[] | null {

        let divs = document.querySelectorAll<HTMLDivElement>("#exceptions .exception-block");

        if(divs.length > 0) {
            return Array.from([...divs]);
        }
        return null;
    }

}
