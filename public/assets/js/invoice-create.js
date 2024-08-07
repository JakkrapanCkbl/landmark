(() => {
    "use strict";
    var e, t, n, c, i;
    function d() {
        $(".select2-show-search").select2({
            minimumResultsForSearch: "",
            width: "100%",
        });
    }
    function s(e) {
        return e.id
            ? $(
                  '<span><img src="http://127.0.0.1:8000/assets/images/users/' +
                      e.element.value.toLowerCase() +
                      '.jpg" class="rounded-circle avatar-sm" /> ' +
                      e.text +
                      "</span>"
              )
            : e.text;
    }
    (e = document.querySelector("#shipping-address")),
        (t = document.querySelector("#addShippingAddress")).addEventListener(
            "click",
            function () {
                e.classList.contains("d-none")
                    ? e.classList.remove("d-none")
                    : e.classList.add("d-none"),
                    t.classList.add("d-none");
            }
        ),
        (c = document.querySelector(".product-description-list")),
        (i = document.querySelector(".product-description-each")),
        (function () {
            function e(e) {
                c.removeChild(e.target.parentElement);
            }
            setInterval(function () {
                setTimeout(function () {
                    for (
                        var t = document.querySelectorAll(".delete-row-btn"),
                            n = 0;
                        n < t.length;
                        n++
                    )
                        t[n].addEventListener("click", e);
                }, 1);
            }, 1);
        })(),
        (n = i.cloneNode(!0)),
        document
            .querySelector(".add-invoice-item-btn")
            .addEventListener("click", function () {
                var e = n.cloneNode(!0);
                var index = document.querySelectorAll(
                    ".product-description-each"
                ).length;
                // Assuming the structure is correctly known, and `e` contains inputs for description and amountjob
                var descriptionInput = e.querySelector(
                    'input[placeholder="ค่าบริการประเมินมูลค่าทรัพย์สิน"]'
                );
                var amountjobInput = e.querySelector(
                    'input[placeholder="ราคา (บาท)"]'
                );

                // Clear the value of the inputs and set their names with the current index
                if (descriptionInput) {
                    descriptionInput.value = "ค่าบริการประเมินมูลค่าทรัพย์สิน "; // Clear the value
                    descriptionInput.name = `description${index}`; // Set unique name
                }

                if (amountjobInput) {
                    amountjobInput.value = ""; // Clear the value
                    amountjobInput.name = `amountjob${index}`; // Set unique name
                }
                c.appendChild(e), d();
            }),
        $(function () {
            $("#inv-datepicker")
                .datepicker({
                    autoclose: !0,
                    format: "dd-mm-yyyy",
                    todayHighlight: !0,
                })
                .datepicker("update", new Date()),
                $("#due-datepicker")
                    .datepicker({
                        autoclose: !0,
                        format: "dd-mm-yyyy",
                        todayHighlight: !0,
                    })
                    .datepicker("update");
        }),
        $(".select2").select2({
            minimumResultsForSearch: 1 / 0,
            width: "100%",
        }),
        d(),
        $(".select2-client-search").select2({
            templateResult: s,
            templateSelection: s,
            escapeMarkup: function (e) {
                return e;
            },
        });
})();
