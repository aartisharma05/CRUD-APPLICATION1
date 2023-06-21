
 var number_of_rows = 1;
 var count=1;
 var optionCount = 1;

 $(document).on('click','.addrow',function(e){
    //console.log();
    let tbody =  $(this).parent().parent().parent();
    console.log(tbody);
        number_of_rows++;
        e.preventDefault();
        var row = $(this).closest('tr');
        var idInput = row.find(':input');
        var optionValue = idInput[0]['attributes']['value']['value'];
        alert(optionValue); 
        if(optionValue === ''){
            optionValue = 1;
        }
        alert(optionValue); 

        tbody.append(`<tr id="row">
        <input type="hidden" name="option[]" value="`+optionValue+`" id="option_value" >
        <td><a class="btn btn-danger removerow" role="button">-</a></td>
        <td><input type="text" name="username[]" id="uname" placeholder="username"></td>
        <td><input type="text" name="email[]" id="emil" placeholder="email"></td>
        <td><input type="text" name="mobile[]" id="mobile" placeholder="mobile"></td>
        <td><input type="text" name="address[]" id="address" placeholder="address"></td>
        <td><input type="text" name="qty[]" id="qty" class="qty" onkeyup="totalmul($(this))" required></td>
        <td><input type="text" name="unitprc[]" id="unitprice" class="unitprice" onkeyup="totalmul($(this))" 
                required></td>
        <td><input type="text" name="total[]" id="total" class="total" readonly></td>
        

    </tr>`)
    
   
   
});



$(document).ready(function(){

    var button = document.getElementById("parent_row_add");
    // var countDisplay = document.getElementById("count");

    button.addEventListener("click", function() {
        optionCount++;
    //     // countDisplay.innerHTML =optionCount;
    //    // Update the option value for existing rows
    // //    $('#option_value').val(optionCount);
    });    

    $(".add_div").click(function(e){
        e.preventDefault();
        // alert(optionCount++,"optioncount");
       
        var tableCount = $('table').length;
        console.log("Table count: " + tableCount);
        //alert(optionCount); 
        let div_element =  $("#parentdiv").html();
        // console.log(div_element);
        
        var mySubString = div_element.substring(
            div_element.indexOf('<input type="hidden" name="option[]" value=') + 1, 
            div_element.lastIndexOf('id="option_value">')
        );

       // console.log(mySubString);
        mySubString = mySubString.replace('input type="hidden" name="option[]" value="','');
        mySubString = mySubString.replace('"','');
            div_element = div_element.replaceAt(962, parseInt(tableCount)+1);

        console.log(div_element);
        var element_to_add = `<div id="parentdiv">
        Option : `;
        element_to_add += count++;
        element_to_add +=` <a class="btn btn-danger removediv" role="button">Remove</a>`;
        element_to_add += div_element;
        element_to_add +=`</div>`;
            // console.log(element_to_add);
        $("#container").append(element_to_add);
    });



});

$(document).on('click','.removediv',function(e){
    e.preventDefault();//to prevent from page refresh
    let row_item = $(this).parent();
    $(row_item).remove();
    tableCount++;
    optionValue++;
    });

$(document).on('click','.removerow',function(e){
        e.preventDefault();//to prevent from page refresh
        let row_item = $(this).parent().parent();
        $(row_item).remove();
        });
        

String.prototype.replaceAt = function(index, replacement) {
            if (index >= this.length) {
                return this.valueOf();
            }
         
            return this.substring(0, index) + replacement + this.substring(index + 1);
}