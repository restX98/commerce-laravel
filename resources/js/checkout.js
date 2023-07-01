class Checkout {
    constructor() {
        this.form = document.querySelector(".address-form");

        this.addressRadioGroup = document.querySelector(".address-radio-group");
        this.streetInput = document.getElementById("street-input");
        this.houseNumberInput = document.getElementById("houseNumber-input");
        this.postalCodeInput = document.getElementById("postalCode-input");
        this.cityInput = document.getElementById("city-input");
        this.provinceInput = document.getElementById("province-input");
        this.countryInput = document.getElementById("country-input");

        this.addressError = document.getElementById("address-error");
        this.streetError = document.getElementById("street-error");
        this.houseNumberError = document.getElementById("houseNumber-error");
        this.postalCodeError = document.getElementById("postalCode-error");
        this.cityError = document.getElementById("city-error");
        this.provinceError = document.getElementById("province-error");
        this.countryError = document.getElementById("country-error");

        this.errorContainer = document.getElementById("server-error");

        this.form.addEventListener("submit", (e) => this.handleSubmit(e));
    }

    handleSubmit(event) {
        event.preventDefault();

        const selectedAddress = this.addressRadioGroup.querySelector(
            "input[type=radio]:checked"
        );

        if (!selectedAddress) {
            this.displayError(this.addressError, "Seleziona un indirizzo");
            return;
        }

        const body = {};
        if (selectedAddress.value.trim() === "new-address") {
            if (!this.validateFields()) {
                return;
            }

            body.street = this.streetInput.value.trim();
            body.houseNumber = this.houseNumberInput.value.trim();
            body.postalCode = this.postalCodeInput.value.trim();
            body.city = this.cityInput.value.trim();
            body.province = this.provinceInput.value.trim();
            body.country = this.countryInput.value.trim();
        } else {
            body.addressId = selectedAddress.value.trim();
        }

        fetch("checkout/place-order", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                accept: "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(body),
        })
            .then((response) => response.json())
            .then((response) => {
                if (response.errors) {
                    const errorFields = response.errors;
                    for (const fieldName in errorFields) {
                        const errorMessage = errorFields[fieldName];
                        const input = document.querySelector(
                            `input[name="${fieldName}"]`
                        );
                        this.displayError(
                            input.nextElementSibling,
                            errorMessage[0]
                        );
                    }
                } else if (!response.success) {
                    this.displayError(
                        this.errorContainer,
                        "Ops, qualcosa è andato storto."
                    );
                } else {
                    window.location.href = "/";
                }
            })
            .catch((err) => {
                console.log(err);
                this.displayError(
                    this.errorContainer,
                    "Ops, qualcosa è andato storto."
                );
            });
    }

    validateFields() {
        const streetInput = this.streetInput.value.trim();
        const houseNumberInput = this.houseNumberInput.value.trim();
        const postalCodeInput = this.postalCodeInput.value.trim();
        const cityInput = this.cityInput.value.trim();
        const provinceInput = this.provinceInput.value.trim();
        const countryInput = this.countryInput.value.trim();

        let isValid = true;

        this.clearErrors();

        if (streetInput === "") {
            this.displayError(this.streetError, "Inserisci una via");
            isValid = false;
        }

        if (houseNumberInput === "") {
            this.displayError(
                this.houseNumberError,
                "Inserisci un numero civico"
            );
            isValid = false;
        } else if (postalCodeInput.length > 10) {
            this.displayError(this.houseNumberError, "Massimo 10 caratteri");
            isValid = false;
        }

        if (postalCodeInput === "") {
            this.displayError(
                this.postalCodeError,
                "Inserisci un codice postale"
            );
            isValid = false;
        } else if (postalCodeInput.length > 10) {
            this.displayError(this.postalCodeError, "Massimo 10 caratteri");
            isValid = false;
        }

        if (cityInput === "") {
            this.displayError(this.cityError, "Inserisci una città");
            isValid = false;
        }

        if (provinceInput === "") {
            this.displayError(this.provinceError, "Inserisci una città");
            isValid = false;
        }

        if (countryInput === "") {
            this.displayError(this.countryError, "Inserisci una città");
            isValid = false;
        }

        return isValid;
    }

    displayError(element, message) {
        element.textContent = message;
        element.style.display = "block";
    }

    clearErrors() {
        this.streetError.textContent = "";
        this.houseNumberError.textContent = "";
        this.postalCodeError.textContent = "";
        this.cityError.textContent = "";
        this.provinceError.textContent = "";
        this.countryError.textContent = "";
    }
}

const checkout = new Checkout();
