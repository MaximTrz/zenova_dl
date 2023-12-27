<script type="text/javascript" src="assets/plugins/select2_new/js/select2.min.js"></script>

<script>
    $('.js-select2').select2({
        placeholder: 'Выберите значение'
    });

    $(document).ready(function() {
        $('.js-inn').on('input', function() {
            let inputValue = $(this).val();
            let numericValue = inputValue.replace(/[^0-9]/g, ''); // Удаляем все символы, кроме цифр

            $(this).val(numericValue);
        });
    });

</script>


<script>

$(document).ready(function(){  

			
			$('.container-fluid').on('submit', '#zaprs', function(){

                $.ajax({
                    type: "POST",
                    url: "modul/ltl-request/ajax/ltl.php",
                    data: $('#zaprs').serialize(),
                    cache: false,
                    dataType: 'json',
                    success: function(result) {
                        //console.log(result.msg);
                        $("#o_content").html(result.msg);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log('Ошибка при выполнении запроса: ' + error);
                    }
                });

                return false;
								
			});
	
});
</script>