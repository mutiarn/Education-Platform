<x-layouts.app title="Admin Dashboard">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      {{-- Total News --}}
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-gray-900/30 p-6 dark-transition">
          <div class="flex items-center">
              <div class="p-2 bg-blue-100 dark:bg-blue-900/30 rounded-lg dark-transition">
                  <x-heroicon-o-document class="w-6 h-6 text-blue-600 dark:text-blue-400" />
              </div>
              <div class="ml-4">
                  <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark-transition">Total Berita</p>
                  <p class="text-2xl font-bold text-gray-900 dark:text-white dark-transition">{{ \App\Models\News::count() }}</p>
              </div>
          </div>
      </div>

      {{-- Published News --}}
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-gray-900/30 p-6 dark-transition">
          <div class="flex items-center">
              <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-lg dark-transition">
                  <x-heroicon-o-check-circle class="w-6 h-6 text-green-600 dark:text-green-400" />
              </div>
              <div class="ml-4">
                  <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark-transition">Berita Terbit</p>
                  <p class="text-2xl font-bold text-gray-900 dark:text-white dark-transition">{{ \App\Models\News::published()->count() }}</p>
              </div>
          </div>
      </div>

      {{-- Total Categories --}}
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-gray-900/30 p-6 dark-transition">
          <div class="flex items-center">
              <div class="p-2 bg-purple-100 dark:bg-purple-900/30 rounded-lg dark-transition">
                  <x-heroicon-o-tag class="w-6 h-6 text-purple-600 dark:text-purple-400" />
              </div>
              <div class="ml-4">
                  <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark-transition">Total Kategori</p>
                  <p class="text-2xl font-bold text-gray-900 dark:text-white dark-transition">{{ \App\Models\Category::count() }}</p>
              </div>
          </div>
      </div>
  </div>

  {{-- Recent News --}}
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow dark:shadow-gray-900/30 dark-transition">
      <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 dark-transition">
          <h2 class="text-lg font-semibold text-gray-900 dark:text-white dark-transition">Berita Terbaru</h2>
      </div>
      <div class="p-6">
          @php
              $recentNews = \App\Models\News::with('category')->latest()->limit(5)->get();
          @endphp

          @if($recentNews->count() > 0)
              <div class="space-y-4">
                  @foreach($recentNews as $news)
                      <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors dark-transition">
                          <div class="flex-1">
                              <h3 class="font-medium text-gray-900 dark:text-white dark-transition">{{ $news->title }}</h3>
                              <div class="flex flex-wrap items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mt-1 dark-transition">
                                  <span class="bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded dark-transition">{{ $news->category->name }}</span>
                                  <span>{{ $news->created_at->format('d M Y') }}</span>
                                  @if($news->is_published)
                                      <span class="px-2 py-1 rounded text-xs bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 dark-transition">Published</span>
                                  @else
                                      <span class="px-2 py-1 rounded text-xs bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 dark-transition">Draft</span>
                                  @endif
                              </div>
                          </div>
                          <div class="flex space-x-2">
                              <a href="{{ route('admin.news.show', $news) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 dark-transition">Lihat</a>
                              <a href="{{ route('admin.news.edit', $news) }}" class="text-yellow-600 dark:text-yellow-400 hover:text-yellow-800 dark:hover:text-yellow-300 dark-transition">Edit</a>
                          </div>
                      </div>
                  @endforeach
              </div>
              <div class="mt-6 text-center">
                  <a href="{{ route('admin.news.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-700 hover:bg-blue-700 dark:hover:bg-blue-600 text-white font-medium rounded-lg transition-colors dark-transition">
                      Lihat Semua Berita
                      <x-heroicon-o-arrow-right class="w-4 h-4 ml-2" />
                  </a>
              </div>
          @else
              <div class="py-12 flex flex-col items-center justify-center">
                  <x-heroicon-o-document class="w-16 h-16 text-gray-300 dark:text-gray-600 mb-4" />
                  <p class="text-gray-500 dark:text-gray-400 text-lg font-medium dark-transition">Belum ada berita tersedia.</p>
                  <p class="text-gray-400 dark:text-gray-500 text-sm mt-1 dark-transition">Mulai dengan menambahkan berita pertama</p>
                  <a href="{{ route('admin.news.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-primary hover:bg-primary text-white font-medium rounded-lg transition-colors dark-transition">
                      <x-heroicon-o-plus class="w-4 h-4 mr-2" />
                      Tambah Berita
                  </a>
              </div>
          @endif
      </div>
  </div>
</x-layouts.app>
