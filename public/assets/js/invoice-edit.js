(() => {
    "use strict";
    var e, t, n, c, i;
    function d() {
        $(".select2-show-search").select2({
            minimumResultsForSearch: "",
            width: "100%",
        });
    }
    function r(e) {
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
        //Added By Note, Add New List in Invoice
        document
            .querySelector(".add-invoice-item-btn-new")
            .addEventListener("click", function () {
                var index = document.querySelectorAll(
                    ".product-description-each"
                ).length;

                // Assuming 'n' is a template node or an element to clone
                var e = n.cloneNode(true);

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
            });
    //Old Codes
    // document
    //     .querySelector(".add-invoice-item-btn")
    //     .addEventListener("click", function () {
    //         for (
    //             var e = n.cloneNode(!0),
    //                 t = e.children[0].children[1].children[0].children,
    //                 i = 0;
    //             i < t.length;
    //             i++
    //         )
    //             (t[0].children.defaultValue = " "),
    //                 console.log(t[0].children.value);
    //         c.appendChild(e), d();
    //     }),
    // $(function () {
    //     $("#inv-datepicker")
    //         .datepicker({
    //             autoclose: !0,
    //             format: "dd-mm-yyyy",
    //             todayHighlight: !0,
    //         })
    //         .datepicker("update", "10-09-2021"),
    //         $("#due-datepicker")
    //             .datepicker({
    //                 autoclose: !0,
    //                 format: "dd-mm-yyyy",
    //                 todayHighlight: !0,
    //             })
    //             .datepicker("update", "11-11-2021");
    // }),
    $(".select2").select2({
        minimumResultsForSearch: 1 / 0,
        width: "100%",
    }),
        d(),
        $(".select2-client-search").select2({
            templateResult: r,
            templateSelection: r,
            escapeMarkup: function (e) {
                return e;
            },
        });
})();
