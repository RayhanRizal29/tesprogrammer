<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">

    <h3>Add Product</h3>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="font-weight-bold" for="name">Product Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label class="font-weight-bold"  for="price">Price:</label>
            <input class="form-control" type="number" name="price" id="price" required>
        </div>

        <div class="form-group">
            <label for="category_id" class="font-weight-bold">Category</label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status_id" class="font-weight-bold">Status</label>
            <div>
                <select id="status_id" class="form-control" name="status_id">
                    <option value="1">dijual</option>
                    <option value="0">Tidak dijual</option>
                </select>
            </div>
        </div>
        <br> 
        <button class="btn btn-success" type="submit">Add Product</button>
    </form>
</div>
</body>
</html>