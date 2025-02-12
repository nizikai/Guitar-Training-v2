<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#000000">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Learning Dm</title>
</head>

<body>

    <button type="button" onclick="window.location.href='/session-3-set-16'" id="completedTrainingButton">
        <img src="..\assets\ChordLearned.jpg" alt="">
    </button>

    <a href="/session-3">
        <img src="..\assets\CloseButton.png" alt="" class="backButton w-10 h-10">
    </a>
    <div class="spacer"></div>

    <div id="learningPage">
        <div class="centered">
            <div class="circleBlue"></div>
        </div>

        <div class="centered">
            <div class="circleGreen"></div>
        </div>

        <button type="button" onclick="init()" id="trainingButton">
            <img src="..\assets\TrainingButton.png" alt="">
        </button>
        <div id="label-container"></div>

        <video id="metronomeVideo" loop playsinline src="..\videos\1-4.mp4" type="video/mp4" class="metronome"></video>

        <img src="..\assets\Dm.png" alt="" class="chordVisual">

        <div class="progress-container">
            <div class="circular-progress">
                <div class="value-container">
                    <img src="..\assets\Note.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/speech-commands@0.4.0/dist/speech-commands.min.js">
    </script>
    <script type="text/javascript">
        // Circular progress bar
        let progressBar = document.querySelector(".circular-progress .value-container");

        // Machine learning
        const URL = "http://localhost:8000/ml/";

        async function createModel() {
            const checkpointURL = URL + "model.json"; // model topology
            const metadataURL = URL + "metadata.json"; // model metadata

            const recognizer = speechCommands.create(
                "BROWSER_FFT", // fourier transform type
                undefined, // speech commands vocabulary feature
                checkpointURL,
                metadataURL);

            // make sure model and metadata loaded via HTTPS requests.
            await recognizer.ensureModelLoaded();

            return recognizer;
        }

        async function init() {
            const recognizer = await createModel();
            const classLabels = recognizer.wordLabels(); // get class labels
            const labelContainer = document.getElementById("label-container");
            for (let i = 0; i < classLabels.length; i++) {
                labelContainer.appendChild(document.createElement("div"));
            }

            let countCProbabilityAboveThreshold = 0;

            recognizer.listen(result => {
                const scores = result.scores; // probability of prediction for each class
                // render the probability scores per class
                for (let i = 0; i < classLabels.length; i++) {
                    const classPrediction = classLabels[i] + ": " + result.scores[i].toFixed(2);
                    labelContainer.childNodes[i].innerHTML = classPrediction;
                }

                // Check if probability is above threshold
                const cIndex = classLabels.indexOf("Dm");
                const cProbability = scores[cIndex];
                if (cProbability > 0.3) {
                    countCProbabilityAboveThreshold++;
                    const progressValue = (countCProbabilityAboveThreshold / 30) * 100;
                    updateProgress(progressValue);
                    if (countCProbabilityAboveThreshold >= 30) {
                        recognizer.stopListening();
                        document.getElementById("completedTrainingButton").style.display = "block";
                        document.getElementById("learningPage").style.display = "none";
                    } else {
                        document.getElementById("completedTrainingButton").style.display = "none";
                    }
                    // Add waveAnimation to circleGreen
                    document.querySelector(".circleGreen").classList.add("waveAnimation");

                    // Remove waveAnimation after a delay
                    setTimeout(() => {
                        document.querySelector(".circleGreen").classList.remove("waveAnimation");
                    }, 1000);
                }
            }, {
                includeSpectrogram: false,
                probabilityThreshold: 0.20,
                invokeCallbackOnNoiseAndUnknown: true,
                overlapFactor: 0.50
            });

            // Start the video with sound
            const video = document.getElementById("metronomeVideo");
            video.muted = false;
            video.play();

            // Hide training button and start wave animation for circleBlue
            document.getElementById("trainingButton").style.display = "none";
            document.querySelector(".circleBlue").classList.add("waveAnimation");
            document.querySelector(".metronome").classList.add("displaying");
        }

        function updateProgress(value) {
            const progressBar = document.querySelector(".circular-progress");
            progressBar.style.background = `conic-gradient( #00AC39 ${value * 3.6}deg, #85E0A3 ${value * 3.6}deg)`;
        }
    </script>

</body>

</html>
