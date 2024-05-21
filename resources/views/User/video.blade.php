<!DOCTYPE html>
    <html lang="en">

    <head>
        @include('User.css')
    </head>
    <body>
        @include('User.nav')
        {{$doctor_ip}}

        @auth
		<span id="doc_ip" style="display: none;">{{$doctor_ip}}</span>


		<div class="row py-4 px-2 px-md-4">
			<div id="remoteVideoLoadingIcon" class="loading-icon w-100 text-center col-12" style="margin-bottom: -50vh;padding-top: 40vh;">
				<h1 class="text-primary">Loading..</h1>
			</div>
			<div id="remoteVideoWrapper" class="video-wrapper col-12" style="height: 80vh;margin-bottom: -80vh;">
			<video id="remoteVideo" autoplay="" style="width: 100vw; height: auto;" ></video>
			</div>
			<div id="video-wrapper" class="video-wrapper col-12 align-items-end justify-content-end" style="height: 80vh;z-index: 10;background: none;">
			<video id="localVideo" autoplay="" style="width: 30vw; height: 30vh;"></video>
			</div>
			<div class="col-12 text-center text-capitalize py-3">
                <div id="error_div" style="" class="">
                    <p id="erro_p"></p>
                </div>
			<a href="{{url('/patient/chats/')}}" class="btn btn-primary" role="button">Go Back</a>
			</div>
		</div>

            <script>
                // Get the video elements from the DOM
                const remoteVideoWrapper = document.getElementById("remoteVideoWrapper");
                const remoteVideoLoadingIcon = document.getElementById("remoteVideoLoadingIcon");
                const remoteVideo = document.getElementById("remoteVideo");
                const DocIP = document.getElementById("doc_ip");
                const localVideo = document.getElementById("localVideo");
                const errorDiv = document.getElementById("error_div");
                const errorP = document.getElementById("error_p");

                // Hide the remote video and show the loading icon
                remoteVideoWrapper.classList.add("hidden");
                remoteVideoLoadingIcon.classList.remove("hidden");

                // Set up the local webcam stream
                navigator.mediaDevices.getUserMedia({ video: true })
                .then((stream) => {
                    localVideo.srcObject = stream;
                })
                .catch((error) => {

                    console.error("Error accessing local webcam:", error);
                    errorP.textContent = "Error accessing local webcam: " + error;
                });

                // Set up the remote stream from the other device
                const ipAddress = DocIP.textContent; // "192.168.0.2" Replace with the IP address of the other device
                const rtcPeerConnection = new RTCPeerConnection();
                rtcPeerConnection.addTransceiver("video", {
                direction: "recvonly"
                });
                rtcPeerConnection.setRemoteDescription({
                type: "offer",
                sdp: `m=application 0 RTP/AVPF\n` +
                    `a=rtcp:${videoTrack.id} IN IP4 ${ipAddress}\n` +
                    `a=extmap-allow-mixed\n` +
                    `a=inactive\n`
                });
                rtcPeerConnection.createAnswer().then((answer) => {
                rtcPeerConnection.setLocalDescription(answer);
                });
                rtcPeerConnection.ontrack = (event) => {
                const stream = new MediaStream([event.track]);
                remoteVideo.srcObject = stream;
                remoteVideoWrapper.classList.remove("hidden");
                remoteVideoLoadingIcon.classList.add("hidden");
                };
            </script>
        @endauth
        @include('User.footer')
    </body>
</html>
