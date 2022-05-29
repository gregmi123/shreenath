
$(".dynamicform_wrapper2").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper2").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper2").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper1").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper1").on("limitReached", function(e, item) {
    alert("Limit reached");
});
$(".dynamicform_wrapper1").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper1").on("afterInsert", function(e, item) {
    for(i=1;i<=9;i++){
        $('#focdetail-'+i+'-received_date').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});
    }    
});

$(".dynamicform_wrapper1").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper1").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper1").on("limitReached", function(e, item) {
    alert("Limit reached");
});

    $('#nepali-datepicker1').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});
    $('#nepali-datepicker2').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});
    $('#focdetail-0-received_date').nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});
    // $(".dynamic-date").on("click", function() {
    //  var id=$(this).attr('id');
    // $('#'+id).nepaliDatePicker({ndpYear: true,ndpMonth: true,ndpYearCount: 150});

// });