import ShopForm from "./ShopForm";

export default class AddShopForm extends ShopForm {

    collectTimeInputs() :HTMLInputElement[]
    {
        const workingTimeInputs = document.querySelectorAll<HTMLInputElement>("#working_time input");
        const exceptionsTimeInputs = document.querySelectorAll<HTMLInputElement>("#exceptions input[type=time]");

        if (workingTimeInputs.length > 0 && exceptionsTimeInputs.length >0) {
            return Array.from([...workingTimeInputs, ...exceptionsTimeInputs]);
        }

        throw new Error("Working Inputs or Exceptions inputs are not collected");
    }

}
