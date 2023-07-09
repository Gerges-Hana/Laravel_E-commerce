<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 How To Integrate Stripe Payment Gateway</title>
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/assets/css/vendors/bootstrap.css">

    <style>

@supports (animation: grow .5s cubic-bezier(.25, .25, .25, 1) forwards) {
	 .tick {
		 stroke-opacity: 0;
		 stroke-dasharray: 29px;
		 stroke-dashoffset: 29px;
		 animation: draw 0.5s cubic-bezier(0.25, 0.25, 0.25, 1) forwards;
		 animation-delay: 0.6s;
	}
	 .circle {
		 fill-opacity: 0;
		 stroke: #219a00;
		 stroke-width: 16px;
		 transform-origin: center;
		 transform: scale(0);
		 animation: grow 1s cubic-bezier(0.25, 0.25, 0.25, 1.25) forwards;
	}
}
 @keyframes grow {
	 60% {
		 transform: scale(0.8);
		 stroke-width: 4px;
		 fill-opacity: 0;
	}
	 100% {
		 transform: scale(0.9);
		 stroke-width: 8px;
		 fill-opacity: 1;
		 fill: #219a00;
	}
}
 @keyframes draw {
	 0%, 100% {
		 stroke-opacity: 1;
	}
	 100% {
		 stroke-dashoffset: 0;
	}
}
 :root {
	 --theme-color: var(--color-purple);
}
 body {
	 height: 100vh;
	 display: flex;
     flex-direction: column;
	 justify-content: center;
	 align-items: center;

}

    </style>
</head>

<body>

    <div class="svg-container">
        <svg class="ft-green-tick" xmlns="http://www.w3.org/2000/svg" height="100" width="100" viewBox="0 0 48 48"
            aria-hidden="true">
            <circle class="circle" fill="#5bb543" cx="24" cy="24" r="22" />
            <path class="tick" fill="none" stroke="#FFF" stroke-width="6" stroke-linecap="round"
                stroke-linejoin="round" stroke-miterlimit="10" d="M14 27l5.917 4.917L34 17" />
        </svg>
    </div>
    <br>


    <div class="w-50">
        <h3 class="text-center">
            Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible
        </h3>
    </div>
    <br>


    <div class="w-25 ">
        <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
    </div>

    <!-- Bootstrap js-->
    <script src="{{ asset('dashboard') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        let path = document.querySelector(".tick");
        let length = path.getTotalLength();

        console.log(length);
    </script>

</body>

</html>
