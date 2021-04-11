<script src="https://code.jquery.com/jquery-latest.js"></script>
<base href="http://localhost/Nam/todolist/">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

	$(document).ready(function()
	{

		//them
        $("#newTaskbtnPublic").click(function()
        {
            var jobName = document.getElementById("newTasktxtPublic").value;
            var jobType = 1;
            if(jobName != "")
            {
            	$.ajax(
            	{
                    url:"<?= base_url()?>index.php/JobController/insert",
                    method:"POST",
                    data: {"jobName" : jobName, "jobType": jobType},
                    success: function(data)
                    {
                        	location.reload();
                    }
                });
            }
        });
  
        //xoa
        $(".deleteBtnPublic").click(function()
        {
            var jobId = $(this).attr("anlong");
            $.ajax(
            	{
                    url:"<?= base_url()?>index.php/JobController/delete",
                    method:"POST",
                    data: {"jobId" : jobId},
                    success: function(data)
                    {
                        	location.reload();
                    }
                });
        });

        //checkbox
        $(".cbTaskPublic").click(function()
        {
            var jobId = $(this).attr("anlong");
            var status = 0;
            if($(this).prop("checked"))//da check ==> status la da xong
            {
            	status = 1;
            } else //bo check ==> status chinh lai la chua xong
            {
            	status = 0;
            }
            $.ajax(
            	{
                    url:"<?= base_url()?>index.php/JobController/updateStatus",
                    method:"POST",
                    data: {"jobId" : jobId, "status" : status},
                    success: function(data)
                    {
                        	location.reload();
                    }
                });
        });

        //modal
        $(".editBtnPublic").click(function()
        {
            var jobId = $(this).attr("anlong");
            $('.editModalPublic').modal('show');
        });
    });
</script>