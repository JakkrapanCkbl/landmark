(()=>{!function(){"use strict";function e(e){if(!e.id)return e.text;
var t=$('<span class="status-indicator projects">'+e.text+"</span>"),n=t.text().split(" ").join("").toLowerCase();
return"inprogress"===n?t.addClass("in-progress"):"onhold"===n?t.addClass("on-hold"):"completed"===n?t.addClass("completed"):t.addClass("empty"),t}$("#data-table").DataTable({language:{searchPlaceholder:"Search...",sSearch:"",lengthMenu:"_MENU_"}}),$(".select2").select2({minimumResultsForSearch:1/0}),$(".select2-status-search").select2({templateResult:e,templateSelection:e,escapeMarkup:function(e){return e}});var t=$("#task-file-input"),n=t.next("label").find("span"),l=$("i.remove"),r=n.text();t.on("change",(function(e){var a=t.val().split("\\").pop();a?(n.text(a),l.show()):(n.text(r),l.hide())})),l.on("click",(function(e){t.val(""),n.text(r),l.hide()}))}();var e=document.querySelector(".sub-list-container");if(e){var t=function(t){"use strict";e.removeChild(t.target.parentElement)},n=document.querySelector(".sub-list-item"),l=document.querySelector("#addTask"),r=document.querySelector("#subTaskInput"),a=document.querySelector("#errorNote"),s=document.querySelector("#deleteAllTasks"),c=document.querySelector("#completedAll");setTimeout((function(){setInterval((function(){for(var e=document.querySelectorAll(".delete-main"),n=0;n<e.length;n++)e[n].addEventListener("click",t)}),10)}),1);var o=0,i=n.cloneNode(!0);c.addEventListener("click",(function(){"use strict";var t=e.children;if(o%2!=0)for(var n=0;n<t.length;n++)t[n].classList.remove("task-completed");else for(var l=0;l<t.length;l++)t[l].classList.add("task-completed");o++})),s.addEventListener("click",(function(){"use strict";e.innerHTML=" "})),l.addEventListener("click",(function(){a.innerText="";var t=i.cloneNode(!0);t.classList.remove("task-completed");
var n=r.value;0!==n.length?(e.appendChild(t),t.children[0].children[1].innerText=n,r.value=""):a.innerText="Please Enter Valid Input"}))}})();



//______Data-Table
var table = $('#data-table1').DataTable({
  buttons: ['copy', 'excel', 'pdf', 'colvis'],
  
    responsive: true,
    language: {
      searchPlaceholder: 'Filter...',
      sSearch: '',
    },
    lengthMenu: [15, 25, 50, 100, 200, 500],
    order: [[0, 'desc']],
    columnDefs: [
      { targets: [0], visible: false, searchable: false },
      { width: "10", targets: 1 },
      //{ width: "100", targets: 3, className: "dt-head-center text-end"},
      //{ width: "100", targets: 3, className: "text-center text-end"},
      //{ width: "5%", targets: 3, className: "text-end" },
    ],
    fixedColumns: true,

  });
  table.buttons().container()
    .appendTo('#data-table1_wrapper .col-md-6:eq(0)');