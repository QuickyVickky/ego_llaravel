<!DOCTYPE html>
<html lang="en">
    <body>
        <h3>Hi, <strong>{{ $Name }}</strong></h3>

        <p>{{ $msg }}</p>

        <p>Click on below link to upload new proofs</p>

        <a href="{{ route('user.reUploadProofs', [$userId, $transactionId]) }}" class="btn btn-primary">
        	Re upload proofs
        </a>

        <p>
            Regards,
            <br>
            Egogram Team
        </p>
    </body>
</html>
