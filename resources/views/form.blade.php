@extends('layouts.app')
@section('title')
   formulaire
@endsection
@section('content')
<div class="body-content">
    <div class="top-content">
    <audio id="audio-Source" src="./public/images/audio.mp3"></audio>
    <div class="audio-content">
        <i class="fa-solid fa-music text-xl" id="play-audio"></i>
        <i id="pause-audio" class="fa-solid fa-volume-xmark text-xl"></i>
    </div>
    <div class="application-mode flex justify-center items-center">
        <i class="fa-sharp fa-solid fa-circle-half-stroke text-xl" id="light-mode"></i>
        <i class="fa-solid fa-moon" id="dark-mode"></i>
    </div>
    </div>
    <div class="steper-componnet">
        <div class="progress-empty">
            <div class="progress-full"></div>
        </div>
        <div class="cercles-steper">
            <span class="cercle">1</span>
            <span class="cercle">2</span>
            <span class="cercle">3</span>
        </div>
    </div>
    <div class="quiz-logo">
        <img id="image" src="./public/images/download.jpg" alt="">
    </div>
    <div class="content flex justify-center items-center ">
        <div class="condition-block isuss">
            <div class="condition-terms w-full mb-4 p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-70 h-42">
                <h3 class="font-mono flex items-center"><i class="fa-solid fa-clipboard-check text-sky-900 mb-2 mr-2"></i><span class="mb-2"> The test consists of 10 questions, each answer earning one point</span></h3>
                <h3 class="font-mono flex items-center"><i class="fa-solid fa-clipboard-check text-sky-900 mb-2 mr-2"></i><span class="mb-2"> To move on to the next question, you must answer one of the answers</span></h3>
                <h3 class="font-mono flex "><i class="fa-solid fa-clipboard-check text-sky-900 mt-1 mr-2"></i><span class="mb-2"> If you do not choose one of the answers and time passes, the answer is <br>considered wrong and you move directly to the next question</span></h3>
            </div>
        </div>
        <div class="condition-block Questions">
            <div class="container">
                <div class="flex justify-center items-center w-full">
                    <div class="inside-cercle w-24 h-24  rounded-full"></div>
                    <div
                        class="flex items-center justify-center text-white absolute bg-zinc-700 rounded-full w-20 h-20">
                        <p class="text-white font-bold" id="date-crono"></p>
                    </div>
                </div>
                <p class="count-question">Question<span class="curent-question"></span>/<span
                        class="total-question"></span></p>
                <div class="question-range w-4/5 h-2 mt-14  m-auto rounded">
                    <div class="increment-range h-full rounded "></div>
                </div>
                <p class="my-Question mt-20 text-xl font-bold">Question</p>
                <div class="content-card w-full mt-20   grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 justify-items-center ">
                    <label
                        class="answers flex items-center justify-center cursor-pointer  my-2  mx-2 max-w-sm p-6 bg-gray-800   rounded-lg shadow-md hover:bg-indigo-900">
                        <h5 id="Answear-a"
                            class=" mb-2 text-center text-xl font-bold  dark:text-white">
                        </h5>
                        <input class="radio-question" type="radio" name="radio">
                        <input class="check-question" type="checkbox" id="yes0">
                    </label>
                    <label
                        class="answers flex items-center justify-center cursor-pointer my-2 mx-2 max-w-sm p-6 bg-gray-800   rounded-lg shadow-md hover:bg-indigo-900">
                        <h5 id="Answear-b"
                            class=" mb-2 text-center text-xl font-bold   dark:text-white">
                        </h5>
                        <input class="radio-question" type="radio" name="radio">
                        <input class="check-question" type="checkbox" id="yes1">

                    </label>
                    <label
                        class="answers flex items-center justify-center cursor-pointer  my-2  mx-2 max-w-sm p-6 bg-gray-800  rounded-lg shadow-md hover:bg-indigo-900 ">
                        <h5 id="Answear-c"
                            class=" mb-2 text-center text-xl font-bold  dark:text-white">
                        </h5>
                        <input class="radio-question" type="radio" name="radio">
                        <input class="check-question" type="checkbox" id="yes2">

                    </label>
                    <label
                        class="answers flex items-center justify-center cursor-pointer  my-2  mx-2 max-w-sm p-6 bg-gray-800  rounded-lg shadow-md hover:bg-indigo-900">
                        <h5 id="Answear-d" class="mb-2 text-xl font-bold  dark:text-white">
                        </h5>
                        <input class="radio-question" type="radio" name="radio">
                        <input class="check-question" type="checkbox" id="yes3">
                    </label>
                </div>
            </div>
            
        </div>
        <div class="condition-block">
            <!-- <p class="condition-terms mb-3">Hello</p> -->
            <div class="scrore">
                <p class="score-number">Your Score is: </p>
                <p class="score-staut">your level is :</p>
                <!-- <div class="mt-10 flex justify-center">
                    <img src="../images/result-3249597_1920-removebg-preview.png" alt="result">
                </div> -->
            </div>
            <div class="w-full">
                <div class="all-answears">
                </div>
            </div>
        </div>

    </div>
    <div class="container-btn">
        <button class="next-question" disabled>Next Question</button>
        <button class="btn-next">Let's Go</button>
    </div>
</main>
@endsection
