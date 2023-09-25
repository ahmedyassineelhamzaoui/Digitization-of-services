<!DOCTYPE html>
<html>

<head>
    <title>ANL Contact Form Submission</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-subtitle {
            color: #888;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>ANL Contact Form Submission</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $formData['cname'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Email: {{ $formData['cemail'] }}</h6>
                <p class="card-text">Message: {{ $formData['message'] }}</p>
            </div>
        </div>
    </div>
    <!-- Link Bootstrap JS (Optional if you need JavaScript functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
