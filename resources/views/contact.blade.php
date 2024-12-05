<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    
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
            <h1 class="mb-4">Contact Us</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf

          
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name') <p class="error-message">{{ $message }}</p> @enderror
                </div>

              
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @error('email') <p class="error-message">{{ $message }}</p> @enderror
                </div>

               
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="4">{{ old('message') }}</textarea>
                    @error('message') <p class="error-message">{{ $message }}</p> @enderror
                </div>

               
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
