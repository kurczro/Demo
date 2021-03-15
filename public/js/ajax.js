
$('#productForm').submit(function(e){
    e.preventDefault()

    let pname = $("#pname").val();
    let mname = $("#mname").val();
    let _token = $("input[name=_token]").val();

    $.ajax({
        url: "{{route('product.add')}}",
        type:"POST",
        data:{
            pname:pname,
            mname:mname,
            _token:_token
        },
        success:function(response)
        {
            if(response)
            {
                $("#productTable tbody").prepend('<tr><td>'+ response.pname +'</td><td>'+response.mname+'</td></tr>');
                $("#productForm")[0].reset();
                $("productModal").modal('hide');
            }
        }
    });
});


function editProduct(id)
{
    $.get('/products/'+id,function(product){
        $("#id").val(product.id);
        $("#pname2").val(product.pname);
        $("#mname2").val(product.mname);
        $("#productEditModal").modal('toggle');
    });
}


$('#productEditForm').submit(function(e){
    e.preventDefault()
    let id = $("#id").val();
    let pname = $("#pname2").val();
    let mname = $("#mname2").val();
    let _token = $("input[name=_token]").val();

    $.ajax({
        url:"{{route('product.update')}}",
        type:"PUT",
        data:{
            id:id,
            pname:pname,
            mname:mname,
            _token:_token
        },
        success:function(response){
            $('#sid' + response.id +' td:nth-child(1)').text(response.pname);
            $('#sid' + response.id +' td:nth-child(2)').text(response.mname);
            $("#productEditModal").modal('toggle');
            $("#productEditForm")[0].reset();
        }
    });
});


function deleteProduct(id)
{
    $.ajax({
        url:'products/'+id,
        type:'DELETE',
        data:{
            _token : $("input[name=_token").val()
        },
        success:function(response)
        {
            $("#sid"+id).remove();
        }
    });
}
