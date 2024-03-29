<section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('/images/caramel-dessert.jpg')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-black">
                    JH<span class="text-sky-400/100">{{ __('msg.recipes') }}</span>
                </h1>
                <p class="text-2xl text-sky-400/75 font-bold my-4">
                    {{__('msg.recipes for the soul')}}
                </p>
                @cannot('authorised')
                <div>
                    <a
                        href="/register"
                        class="inline-block border-2 border-white text-sky-400/50 py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                        >{{__('msg.sign Up to post a recipe')}}</a>
                </div>
                @endcannot
            </div>
    </section>
