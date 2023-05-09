let postBtn = document.querySelector('.post-btn');
let categoryBtn = document.querySelector('.category-btn');
let subCategoryBtn = document.querySelector('.subcategory-btn');
let tagBtn = document.querySelector('.tag-btn');

let iconPost = document.querySelector('.icon-post');
let togglerBtn = document.querySelector('.toggler-btn');
let togglerBtn2 = document.querySelector('.toggler-btn2');
let togglerBtn3 = document.querySelector('.toggler-btn3');
let togglerBtn4 = document.querySelector('.toggler-btn4');
let iconPost2 = document.querySelector('.icon-post2');
let iconPost3 = document.querySelector('.icon-post3');
let iconPost4 = document.querySelector('.icon-post4');



postBtn.style.display = 'block';
categoryBtn.style.display = 'block';
subCategoryBtn.style.display = 'block';
tagBtn.style.display = 'block';
iconPost.style.display = 'none';
iconPost2.style.display = 'none';
iconPost3.style.display = 'none';
iconPost4.style.display = 'none';



togglerBtn.addEventListener("click", hideBtn);
togglerBtn2.addEventListener("click", hideBtn2);
togglerBtn3.addEventListener("click", hideBtn3);
togglerBtn4.addEventListener("click", hideBtn4);



togglerBtn2.style.display = 'none';
togglerBtn3.style.display = 'none';
togglerBtn4.style.display = 'none';




function hideBtn(){

        postBtn.style.display = 'none';
        categoryBtn.style.display = 'none';
        subCategoryBtn.style.display = 'none';
        tagBtn.style.display = 'none';

        iconPost.style.display = 'block';
        iconPost2.style.display = 'block';
        iconPost3.style.display = 'block';
        iconPost4.style.display = 'block';



        togglerBtn.style.display = 'none';
        togglerBtn3.style.display = 'none';
        togglerBtn4.style.display = 'none';
        togglerBtn2.style.display = 'block';


}

function hideBtn2(){

    postBtn.style.display = 'block';
    categoryBtn.style.display = 'block';
    tagBtn.style.display = 'block';
    subCategoryBtn.style.display = 'block';


    iconPost.style.display = 'none';
    iconPost2.style.display = 'none';
    iconPost3.style.display = 'none';
    iconPost4.style.display = 'none';



    togglerBtn2.style.display = 'none';
    togglerBtn3.style.display = 'none';
    togglerBtn4.style.display = 'none';
    togglerBtn.style.display = 'block';

}

function hideBtn3(){

    postBtn.style.display = 'block';
    categoryBtn.style.display = 'block';
    tagBtn.style.display = 'block';
    subCategoryBtn.style.display = 'block';


    iconPost.style.display = 'none';
    iconPost2.style.display = 'none';
    iconPost3.style.display = 'none';
    iconPost4.style.display = 'none';



    togglerBtn2.style.display = 'none';
    togglerBtn4.style.display = 'none';
    togglerBtn.style.display = 'none';
    togglerBtn3.style.display = 'block';


}


function hideBtn4(){

    postBtn.style.display = 'block';
    categoryBtn.style.display = 'block';
    subCategoryBtn.style.display = 'block';
    tagBtn.style.display = 'block';

    iconPost.style.display = 'none';
    iconPost2.style.display = 'none';
    iconPost3.style.display = 'none';
    iconPost4.style.display = 'none';



    togglerBtn2.style.display = 'none';
    togglerBtn.style.display = 'none';
    togglerBtn3.style.display = 'none';
    togglerBtn4.style.display = 'block';



}






