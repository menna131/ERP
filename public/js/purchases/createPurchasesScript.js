//////////////////////////////////////////////////////////////////////////////
// Select2

$(document).ready(function() {
    $(".item_dropdown").select2();
    $(".supplier_dropdown").select2();
    $(".payment_dropdown").select2();
    
});


//////////////////////////////////////////////////////////////////////////////////////////
// DateInput

document.getElementById("today").valueAsDate = new Date();


////////////////////////////////////////////////////////////////////////////////////////
// Table Design //

var tablePro = document.getElementById('Table');
var tbody = document.getElementById('tbody');
var firstRow = tablePro.rows[1];
var newTbody = {};
var count = 1;
let indexTable = 2;



function delRow(row) {
    let i = row.parentNode.parentNode.rowIndex;
    if (i != 1) {
        document.getElementById('Table').deleteRow(i);
    } else {
        firstRow.cells[1].getElementsByTagName("select")[0].value =
            firstRow.cells[1].getElementsByTagName("select")[0].options[0].value; // option value = 0
        firstRow.cells[2].getElementsByTagName("input")[0].value = '';
        firstRow.cells[3].getElementsByTagName("input")[0].value = '';
        firstRow.cells[4].getElementsByTagName("input")[0].value = '';
    }
}

function addRow(forcedLength, childName) {
    //forcedLength to solve table when reset
    $(".product").select2('destroy');

    let newRow = firstRow.cloneNode(true);
    let len = tablePro.rows.length;
    let newLength = forcedLength ? 0 : len - 1;
    // document.getElementById("span-count").innerHTML = count+1;
    newRow.cells[0].getElementsByTagName("span")[0].innerHTML = indexTable;

    let inp1 = newRow.cells[1].getElementsByTagName("select")[0];
    let attrNumber = (Number(inp1.getAttribute("number")) + count);

    let inp2 = newRow.cells[2].getElementsByTagName("input")[0];
    let attrQuantity = (Number(inp2.getAttribute("quantity")) + count);

    let inp3 = newRow.cells[3].getElementsByTagName("input")[0];
    let attrPrice = (Number(inp3.getAttribute("price")) + count);

    let inp4 = newRow.cells[4].getElementsByTagName("input")[0];
    let attrTotal = (Number(inp4.getAttribute("total")) + count);

    let inpDel = newRow.cells[0].getElementsByTagName("button")[0];
    inpDel.id = (inpDel.id.replace('[1]', '[' + (indexTable) + ']'));


    let errorDiv1 = newRow.cells[1].getElementsByTagName("div")[0];
    let errorDiv2 = newRow.cells[2].getElementsByTagName("div")[0];
    let errorDiv3 = newRow.cells[3].getElementsByTagName("div")[0];
    let errorDiv4 = newRow.cells[4].getElementsByTagName("div")[0];

    setAttrTableCells(inp1, "number", attrNumber);
    setAttrTableCells(inp2, "quantity", attrQuantity);
    setAttrTableCells(inp3, "price", attrPrice);
    setAttrTableCells(inp4, "total", attrTotal);

    setAtrrTableMsg(errorDiv1);
    setAtrrTableMsg(errorDiv2);
    setAtrrTableMsg(errorDiv3);
    setAtrrTableMsg(errorDiv4);

    count+=1;
    indexTable+=1;
    return newRow;
}

function setAttrTableCells(element, attrName, attrReplace) {
    element.id = (element.id.replace('0', count));
    element.name = (element.name.replace('[0]', '[' + count + ']'));
    if (element == firstRow.cloneNode(true).cells[1].getElementsByTagName("select")[0]) {
        element.value = element.options[0].value;
    } else {
        element.value = '';
    }
    element.setAttribute(attrName, attrReplace);
}

function setAtrrTableMsg(element) {
    element.id = (element.id.replace('.0.', '.' + count + '.'));
    element.innerHTML = '';
}

function appendRow(forcedLength, childName = newTbody) {
    tbody.appendChild(addRow(forcedLength, tbody));
    $(".product").select2(); 

}

function resetTable() {
    newTbody = document.createElement('tbody');
    appendRow(true);
    newTbody.setAttribute("id", "tbody");
    newTbody.setAttribute("name", "newTbody");
    tbody.parentNode.replaceChild(newTbody, tbody);
}
///////////////////////////////////////////////////////////////////////////////////////////
// The Calculations

function calcTotal(price, quantity, rowNo) {

    let totalPrice = (quantity) * (price);
    $('input[name="data[' + rowNo + '][total]"]').val(totalPrice);
}

function calcTotalFromPrice(value) {
    let rowNo = value.getAttribute('price');
    let price = $('input[name="data[' + rowNo + '][price]"]').val();
    let quantity = $('input[name="data[' + rowNo + '][quantity]"]').val();
    calcTotal(price, quantity, rowNo);
    sumOfTotal();
}

function calcTotalFromQuantity(value) {
    let rowNo = value.getAttribute('quantity');
    let price = $('input[name="data[' + rowNo + '][price]"]').val();
    let quantity = $('input[name="data[' + rowNo + '][quantity]"]').val();
    calcTotal(price, quantity, rowNo);
    sumOfTotal();
}

function sumOfTotal() {
    let sumOfTotal = 0;
    $('.total-price').each(function() {
        sumOfTotal += Number($(this).val());
    });
    $('input[name="sum-of-total"]').val(sumOfTotal);
}

function totalAfterDiscount() {
    let discountPer = $('input[name="discount-percentage"]').val();
    let totalSum = 0;
    $('.total-price').each(function() {
        totalSum += Number($(this).val());
    });

    $('input[name="discount-LE"]').val(totalSum*(discountPer/100));
    let totalAfterDisc = totalSum - (totalSum * (discountPer / 100));
    $('input[name="total-after-discount"]').val(totalAfterDisc);

}

///////////////////////////////////////////////////////////////////////////////////////
$('#payment_drop').change(function() {
    var result = $(this).val();
    if(result=="install"){
        $('#installment_form').modal("show");
    }
});