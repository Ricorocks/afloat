    <!-- FAQ section -->
    <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
        <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
          <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
          <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
            @foreach($content->faq_list as $faq)
            @if($faq->type == "new_set")
            <div class="pt-6">
              <dt>
                <!-- Expand/collapse question button -->
                <button type="button" class="flex w-full items-start justify-between text-left text-gray-900" aria-controls="faq-0" aria-expanded="false">
                  <span class="text-base font-semibold leading-7">{{ $faq->faq_question }}</span>
                  <span class="ml-6 flex h-7 items-center">
                    <!--
                      Icon when question is collapsed.
  
                      Item expanded: "hidden", Item collapsed: ""
                    -->
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>
                    <!--
                      Icon when question is expanded.
  
                      Item expanded: "", Item collapsed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                    </svg>
                  </span>
                </button>
              </dt>
              <dd class="mt-2 pr-12" id="faq-0">
                <p class="text-base leading-7 text-gray-600">{{ $faq->faq_answer }}</p>
              </dd>
            </div>
            @endif
            @endforeach
            <!-- More questions... -->
          </dl>
        </div>
      </div>