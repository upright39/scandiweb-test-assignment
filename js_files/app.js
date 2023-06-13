const container = document.getElementById("switcher");
const select = document.getElementById("productType");
const sku = document.getElementById("sku");
const save_btn = document.getElementById("save");
const product_form = document.getElementById("product_form");
const error = document.getElementById("error");

const setError = (msg) => {
	save_btn.value = "save";
	error.innerText = msg;
};

(() => {
	
	product_form.addEventListener("submit", async (e) => {
		e.preventDefault();
		save_btn.value = "loading...";	

		const majorInput = Array.from(
			document.querySelectorAll(
				"#size, #weight, #height, #width, #length, #price"
			)
		);

		if (sku.value == "") {
			return setError("SKU value cannot be empty");
		}
	
		for (let i = 0; i < majorInput.length; i++) {
			if (parseInt(majorInput[i]?.value) < 0) {
				return setError(
					`${majorInput[i].id} cannot be a negative value`
				);
			}

			if (!/^\d+(.\d+)?$/.test(majorInput[i]?.value)) {
				return setError(`${majorInput[i].id} can only be numbers`);
			}
		}

		const req = await fetch(
			`/scandiweb-test/api/check-sku/?sku=${sku.value}`
		);
		const res = await req.json();

		if (res) {
			return setError("SKU is not unique");
		}

		product_form.submit();
	});

})();

const changeSwitcher = () => {
	if (select.value == "DVD") {
		container.innerHTML = `
           <div id="DVD">
                 <div class="item">
                    <label class="label">Size (MB)</label>
                    <input type="text" name="size" id="size" class="input" required />
                </div>
                <p class="desc">*Please provide the product size</p>
           </div>
        `;
	} else if (select.value == "Book") {
		container.innerHTML = `
            <div id="Book">
                <div class="item">
                    <label class="label">Weight (KG)</label>
                    <input type="text" name="weight" id="weight" class="input" required />
                </div>
                <p class="desc">*Please provide the product weight</p>
            </div>
        `;
	} else if (select.value == "Furniture") {
		container.innerHTML = `
           <div id="Furniture">
                 <div class="item">
                    <label class="label">Height (CM)</label>
                    <input type="text" name="height" id="height" class="input" required />
                </div>

                <div class="item">
                    <label class="label">Width (CM)</label>
                    <input type="text" name="width" id="width" class="input" required />
                </div>

                <div class="item">
                    <label class="label">Length (CM)</label>
                    <input type="text" name="length" id="length" class="input" required />
                </div>
                <p class="desc">*Please provide the product dimensions HxWxL</p>
           </div>
        `;
	}
};
