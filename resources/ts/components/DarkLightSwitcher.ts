export default class DarkLightSwitcher {

    protected htmlElement :HTMLElement;
    protected toggleInput :HTMLInputElement;

    constructor() {
        this.htmlElement = document.documentElement;
        this.toggleInput = this.collectThemeSwitcher();
        this.toggleInput.addEventListener("change", () => this.handleSwitch());
        this.setInitialTheme();
    }

    protected setInitialTheme() :void
    {
        if(localStorage.getItem("shop-manager-theme") === "dark")
        {
            this.htmlElement.classList.add("dark");
            this.toggleInput.checked = true;
        }
    }

    protected handleSwitch()
    {
        if(this.toggleInput.checked) {
            this.turnDarkMode();
            this.putThemeInLocalStorage();
        }
        else {
            this.turnLightMode();
            this.putThemeInLocalStorage()
        }
    }

    protected putThemeInLocalStorage()
    {
        let chosenTheme = this.htmlElement.classList.contains("dark");
        if(chosenTheme) {
            localStorage.setItem("shop-manager-theme", "dark");
        }
        else localStorage.setItem("shop-manager-theme", "light");
    }

    protected turnLightMode() {
        this.htmlElement.classList.remove("dark");
    }

    protected turnDarkMode() {
        this.htmlElement.classList.add("dark");
    }

    protected collectThemeSwitcher() :HTMLInputElement
    {
        const toggleInput = document.getElementById("theme-switcher");
        if(!toggleInput) {
            throw new Error("There is not theme switcher");
        }
        if(!(toggleInput instanceof HTMLInputElement)) {
            throw new Error("Selected html element is not input");
        }
        return toggleInput;
    }
}
