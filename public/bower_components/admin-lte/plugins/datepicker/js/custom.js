
  function setDateRangePicker(input1, input2){
    $(input1).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
    $(input1).on("change.datetimepicker", function (e) {
      $(input2).val("")
          $(input2).datetimepicker('minDate', e.date);
      })
    $(input2).datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
  }

  function setDatePicker(){
    $(".datepicker").datetimepicker({
      format: "YYYY-MM-DD",
      useCurrent: false
    })
  }
  
  
 

  $(document).ready(function(){
      setDatePicker()
      setDateRangePicker(".startdate", ".enddate")
      setDateRangePicker(".startdate2", ".enddate2")
      setDateRangePicker(".startdate3", ".enddate3")
      setDateRangePicker(".startdate4", ".enddate4")
      setDateRangePicker(".startdate5", ".enddate5")
      setDateRangePicker(".startdate6", ".enddate6")
  })
