<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Portal With Twilio</title>
    <!-- Bootstrap styles CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Add Phone Number
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label>Enter Phone Number</label>
                                    <input type="tel" class="form-control" placeholder="Enter Phone Number">
                                </div>
                                <button type="submit" class="btn btn-primary">Register User</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Send SMS message
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label>Select users to notify</label>
                                    <select multiple class="form-control">
                                        @foreach ($users as $user)
                                        <option>{{$user->phone_number}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Notification Message</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send Notification</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>