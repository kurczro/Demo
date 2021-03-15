@extends('layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    
</head>

<body>

    @section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-9">
                <h2>Demo - 11Digits</h2>
            </div>
            <div class="col">
                <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#productModal">Add new product</a>
            </div>
            
        </div>

        <table class="table mt-3" id="productTable">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr id="sid{{$product->id}}">
                        <td>{{$product->pname}}</td>
                        <td>{{$product->mname}}</td>
                        <td></td>
                        <td>
                            <a href="javascript:void(0)" onclick="editProduct({{$product->id}})" class="btn-sm btn-dark">Edit</a>
                            <a href="javascript:void(0)" onclick="deleteProduct({{$product->id}})" class="btn-sm btn-dark">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">New product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productForm">
                        @csrf
                        <div class="form-group">
                            <label for="pname">Product name</label>
                            <input type="text" class="form-control" id="pname" />
                        </div>
                        <div class="form-group">
                            <label for="mname">Manufacturer name</label>
                            <input type="text" class="form-control" id="mname" />
                        </div>
                        <!-- <div class="form-group">
                            <label for="cname">Category name</label>
                            <input type="text" class="form-control" id="cname" />
                        </div> -->
                        <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark mt-2" onclick="window.location.reload(true);">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="productEditModal" tabindex="-1" aria-labelledby="productEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productEditModalLabel">Edit product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="productEditForm">
                        @csrf
                        <input type="hidden" id="id" name="id" />
                        <div class="form-group">
                            <label for="pname">Product name</label>
                            <input type="text" class="form-control" id="pname2" />
                        </div>
                        <div class="form-group">
                            <label for="mname">Manufacturer name</label>
                            <input type="text" class="form-control" id="mname2" />
                        </div>
                        <!-- <div class="form-group">
                            <label for="cname">Category name</label>
                            <input type="text" class="form-control" id="cname2" />
                        </div> -->
                        <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark mt-2">Edit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    @endsection

    @section('script')

    @endsection

</body>
</html>