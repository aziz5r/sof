<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .error-message {
            color: #d9534f;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1 class="mb-4">Create New Product</h1>

            <!-- Flash Message Handling (Optional) -->
            @if(session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('product.create') }}">
                @csrf

               
                <div class="mb-3">
                    <label for="title" class="form-label">Product Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    @error('title') <p class="error-message">{{ $message }}</p> @enderror
                </div>

            
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    @error('description') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" min="0">
                    @error('price') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label for="product_type" class="form-label">Product Type</label>
                    <input type="text" name="product_type" id="product_type" class="form-control" value="{{ old('product_type') }}">
                    @error('product_type') <p class="error-message">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Create Product</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
