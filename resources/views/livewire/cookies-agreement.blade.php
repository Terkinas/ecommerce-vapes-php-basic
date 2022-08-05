<form action="{{ route('info.cookieagreement') }}" method="post" class="fixed left-0 right-0 bottom-0 z-40">
    @csrf
    <div class="pt-4 pb-4 bg-gray-50 border-gray-100 border-t-1">
        <div class="container px-4 mx-auto">
            <h3 class="font-heading text-3xl text-gray-800 mb-4 md:text-center">Cookies on this site</h3>
            <p class="text-xs md:ml-24 text-gray-500 mb-16">We and selected partners and related companies, use cookies and similar technologies as specified in our Cookies Policy. You agree to consent to the use of these technologies by clicking Accept, or by continuing to browse this website. You can learn more about how we use cookies and set cookie preferences in Settings.</p>
            <div class="text-center"><button type="submit" class="inline-block w-full sm:w-auto px-7 py-4 mb-4 sm:mb-0 sm:mr-5 text-center font-medium bg-green-500 hover:bg-green-600 text-white rounded transition duration-250">Accept All Cookies</button><a class="inline-block w-full sm:w-auto px-7 py-4 text-center font-medium border border-white text-gray-400 hover:border-gray-200 hover:text-gray-200 rounded" href="#">Cookies Settings</a></div>
        </div>
    </div>
</form>