<template>
  <header class="header">
    <!-- <div class="flex items-center justify-between mx-10 home">
    <img class="w-52" src="../assets/images/logo.png" alt="">
    <p>Im a setter</p>
  </div> -->
<NavBare/>

  <div>
    <section class="p-32 header_items">
          <div class="left_item">
      <h1>Don't Buy 
      <span class=" text-amber-400"> Adobt </span> </h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,<br>
        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum<br>
        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium <br>
        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis <br>
        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam <br>
        nihil, eveniet aliquid culpa officia</p>
        <button class=""><router-link to="/signing" >Find Your Friend <i class="m-2 mt-8 fi fi-rr-arrow-right"></i></router-link></button>
          </div>
          <div class="right_item">
            <img src="../assets/images/landingHeader.png" alt=""> 
          </div>
    </section>
  </div>
  </header>
      <main>
      <section class="mt-20 mb-20 services">
        <div>
          <h1>The kind of service we provide</h1>
          <p>Our platform offers you several services alongside adoption offers that concern you animals</p>
        </div>
      <section class="flex flex-col items-center services_items mt-28">

        <div class="flex gap-48">
          <span>
            <div>
              <img src="../assets/icones/found.svg" alt="icones">
            </div>
            <div class="services_text">
              <h4>Found a friend</h4>
              <p>the second is to look for a friend you can contact them own animals and save them give them a second chance</p>
            </div>
          </span>

          <span>
            <div>
              <img src="../assets/icones/recherche.svg" alt="icones">
            </div>
            <div class="services_text">
              <h4>Found a sitter to your animal</h4>
              <p>if you are looking for someone you can trust to take care of your animals, 
                here you can find people you can trust to take care of your animals while you are away</p>
            </div>
          </span>
        </div>
          
          <div class="flex gap-48 mt-16">
            <span align="right">
            <div>
              <img src="../assets/icones/pet.svg" alt="icones">
            </div>
            <div class="services_text">
              <h4>Put your animal for adoption</h4>
              <p>the platform presents you with two types of services that relate to the adoption of animals, 
                first there is the option to put your animals to adopt instead of abounding them in the street</p>
            </div>
          </span>
          <span>
            <div>
              <img src="../assets/icones/info.svg" alt="icones">
            </div>
            <div class="services_text">
              <h4>Information about pet</h4>
              <p>we give you a complete guide on how to treat your animals, take care of them, 
                their food and how to avoid serious illness.</p>
            </div>
          </span>
          </div>

      </section>
    </section>

      <section class="flex items-center justify-around folowers m-44">
        <span class="flex flex-col items-start gap-10">
          <h3 class="w-1/2 text-left ">
            Get thousands of active followers
          </h3>
          <p class="w-1/2 text-left ">Yet bed any for travelling assistance indulgence unpleasing. 
            Not thoughts all exercise blessing. Indulgence way everything 
            joy alteration boisterous the attachment.</p>
            <button>Start Here</button>
        </span>

        <span class="folowers_image">
          <img src="../assets/images/girl.png" alt="">
        </span>
      </section>

      <section class="feedback" >
        <h3>What Our Happy User's Says </h3>
        <p>comments from our large animal-loving community and their feedback</p>
        <div class="flex flex-wrap gap-2 justify-evenly">
          <div  class="feedback_form" v-for="item in 4" :key="item" >
          <button class="star">&#9734;</button>
          <button class="star">&#9734;</button>
          <button class="star">&#9734;</button>
          <button class="star">&#9734;</button>
          <button class="star">&#9734;</button>
          <img class="" src="../assets/icones/feedback.svg" alt="icone">
          <div>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore </p>
          </div>
          <div class="flex items-center gap-4 mt-5 ">
            <img src="../assets/images/profile.jpg" alt="">
            <div>
              <h5>John Doe</h5>
              <p>Casablanca</p>
            </div>
          </div>
        </div>
        </div>
      </section>

      <section class="flex flex-wrap justify-between gap-40 m-10 jlustify-center petSpeak">
        <div class="w-5/12">
          <img src="../assets/images/docCat.png" class="h-auto max-w-full"  alt="image">
        </div>
        <div class="w-5/12 text-left mt-14">
          <h3 class="w-4/6 text-4xl leading-relaxed">Pets do speak, but only to those 
            who know how to listen</h3>
            <p class="w-4/6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
              molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
              numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
              molestiae quas vel sint commodi repudiandae </p>
        </div>
      </section>

      <section class="flex justify-around m-32 questions">
        <div class="text-left mt-14">
          <h3 class="w-4/6 text-5xl tracking-widest leadig-relaxed">Any Questions? <br> We Got You.</h3>
          <p class="w-3/6">Yet bed any for  assistance indulgence unpleasing. 
            Not thoughts all exercise blessing. Indulgence way 
            everything joy alteration boisterous the attachment.</p>
        </div>
      
        <div>
          <div class="container">
    <h2>Frequently Asked Questions</h2>
    <div class="accordion">
      <div class="accordion-item">
        <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">SHOULD I DECLAW MY CAT?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Declawing your cat is a personal choice. Your veterinarian will go over various 
            factors to determine if this is the best choice for your cat. Like all procedures, 
            there can be complications, however, these are taken into consideration and communicated 
            with the pet owners in order to reach a final decision.  If it does need to be done, it is 
            better to do it when the animal is young.
          </p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">WHEN DO WE NEED FECAL SAMPLES, AND WHY?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>It is recommended that a fecal sample be provided at annual/wellness visits, new puppy/kitten exams, 
            and when GI symptoms are present. Only tapeworms and roundworms are visible to the naked eye. 
            On some occasions diarrhea, vomiting, and weight loss are symptoms of intestinal worms but many 
            intestinal parasites go undetected without running intestinal parasite tests. Even if your pet is 
            taking parasite prevention medication, it is never 100% effective. 
          </p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">DOES MY PET NEED DENTAL CARE?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Dental health  is just as important for dogs and cats as it is for people. Bacteria and food  accumulate around 
            the teeth and, if left unchecked, will lead to gingivitis loss of bone and soft tissue. This can result in tooth 
            loss, an abscess, or a bacterial infection. </p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">WHAT TYPES OF ANIMALS DO YOU SEE?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Tracy Animal Hospital welcomes all breeds of cats and dogs.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">WHAT DOG AND CAT FOOD BRANDS DO YOU RECOMMEND?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>There are many great brands out there. The ones we recommend the most are based on years of 
            results and healthy dogs and cats. Occasionally, prescription diets are recommended based on a pet's specific needs.
          </p>
        </div>
      </div>
    </div>
        </div>
        </div>
      </section>

      <section class="treatPet">
        
          <h2>How to treat your pet</h2>
          <p>we offer you a complete guide of how to treat your anime</p>
          
          <div class="flex flex-wrap gap-24 treatPet_flex">
            <!-- <div class="w-6/12 treatPet_img"> -->
              <img class="w-5/12" src="../assets/images/doctor.png" alt="">
            <!-- </div> -->
            <div class="flex flex-col items-center w-6/12 gap-10 jutify-center ">
              <p class="w-5/6 text-left">Pets, you gotta love 'em, right? And when you want to show your pet 
              just how much you love them, there are so many ways to do it. The first thing that 
              comes to mind might be giving your pet a handful of treats, but there are so many 
              other more creative ways to show your affection. Some pet experts even argue that 
              treats should be reserved for training and rewarding good behavior — not for whenever
              you feel like giving one out. Additionally, according to Pet MD, dogs actually form a 
              weaker bond with people who just feed them as opposed to people who spend time exercising 
              and playing with them, so you'll definitely want to try making a lengthy fetch session a weekly 
              ritual for your dog.</p>
                <button>Let's descovred</button>
            </div>
          </div>
          
      </section>
    </main>
    
    <footer class=".footer mt-40 pt-24 ">
      <section class="footer_titele">
        <h4 class="text-5xl leading-relaxed text-center">Animals are such agreeable friends, <br> Don't lose it</h4>
        <button>Find Your Friend</button>
      </section>

      <section class="flex flex-row gap-40 footer_main ">
      <div class="basis-2/5 col ">
        <h5>Best Friend</h5>
        <p class="text-left">Best Friend and an animal adoption platform 
          helps you find animals to adopt and at the same 
          time not to give up your animals here you can meter 
          funds to find a new family for your animals, 
          also offers you the services of find the best pet sitter</p>
      </div>

      <div class="flex gap-36 basis-3/5">
          <ul class="col ">
          <h5>Company</h5>
          <li>About us</li>
          <li>Careers</li>
          <li>Blog</li>
          <li>Pricing</li>
        </ul>
          <ul class="col ">
          <h5>Product</h5>
          <li>Facebook Followers</li>
          <li>Instagram Followers</li>
          <li>Twitter Followers</li>
          <li>TikTok Followers</li>
        </ul>
        <ul class="col ">
          <h5>Resources</h5>
          <li>Proposal Template</li>
          <li>Invoices</li>
          <li>Tuturoial</li>
          <li>How to increase activity</li>
        </ul>
      </div>

      </section>

      <section class="foote_bottom">
        <p>2022 DOUNYA-MELLOUKI. All rights reserved.  - Best Friend</p>
      </section>
    </footer>
</template>


<style>

</style>


<script>
import NavBare from '../components/NavBare.vue';

export default
{
    components: {
    NavBare
  },
  data(){
    return{
      lopin : 4,
    }
  },
  mounted(){
    const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (let i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
  }
}

</script>
