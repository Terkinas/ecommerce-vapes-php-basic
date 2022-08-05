<form action="{{ route('info.cookieagreement') }}" method="post" class="fixed left-0 right-0 bottom-0 z-40">
    @csrf
    <div class="pt-8 pb-4 bg-gray-50 border-gray-100 border-t-1">
        <div class="container px-4 mx-auto">
            <h3 class="font-heading text-xl text-gray-800 mb-4 md:text-center">Cookies on this site</h3>
            <p class="text-xs md:ml-24 text-gray-400 mb-8">By clicking accept, you agree to the storing of cookies on your device to enhance site navigation. Cookies are important to the proper functioning of a site. To improve your experience, we use cookies to remember log-in details and provide secure log-in, collect statistics to optimize site functionality, and deliver content tailored to your interests. Click Agree and Proceed to accept cookies and go directly to the site or click on More Information to see detailed descriptions of the types of cookies and choose whether to accept certain cookies while on the site.</p>
            <div class="text-center"><button type="submit" class="inline-block w-full sm:w-auto px-7 py-4 mb-3 sm:mb-0 sm:mr-5 text-center font-medium bg-green-500 hover:bg-green-600 text-white rounded transition duration-250">Accept All Cookies</button><a class="inline-block w-full sm:w-auto px-7 py-4 text-center font-medium border border-white text-gray-400 hover:border-gray-200 hover:text-gray-200 rounded" href="#">Cookies Settings</a></div>
        </div>
    </div>
</form>