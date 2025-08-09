<?php /* Template Name: Android Development Studio Landing */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php bloginfo('name'); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .hero-gradient { background: linear-gradient(135deg, #f0f9ff 0%, #e6f7ff 100%); }
  </style>
  <?php wp_head(); ?>
</head>
<body>
  <!-- Header -->
  <header class="bg-white shadow-sm py-4">
    <div class="container mx-auto px-6 flex justify-between items-center">
      <div class="flex items-center">
        <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-xl">A</div>
        <span class="ml-3 text-xl font-bold">Android Dev Studio</span>
      </div>
      <nav class="hidden md:flex space-x-8">
        <a href="#" class="text-gray-600 hover:text-blue-600">Android AI</a>
        <a href="#" class="text-gray-600 hover:text-blue-600">Phones</a>
        <a href="#" class="text-gray-600 hover:text-blue-600">iOS Updates</a>
        <a href="#" class="text-gray-600 hover:text-blue-600">How To & SEO</a>
        <a href="#" class="text-gray-600 hover:text-blue-600">Privacy & VPN</a>
        <a href="#" class="text-gray-600 hover:text-blue-600">Social Marketing</a>
      </nav>
      <div class="flex items-center space-x-4">
        <button class="text-gray-600 font-medium">Sign In</button>
        <button class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition">Get Started</button>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero-gradient py-20">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
      <div class="md:w-1/2 mb-12 md:mb-0">
        <h1 class="text-4xl md:text-5xl font-bold leading-tight text-gray-900 mb-6">
          Android insights.<br/>Stay ahead of the curve.
        </h1>
        <p class="text-xl text-gray-600 mb-8">
          Tutorials, tools and news for developers and mobile enthusiasts.
        </p>
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
          <button class="bg-blue-600 text-white px-8 py-4 rounded-lg font-medium text-lg hover:bg-blue-700 transition">
            Explore Guides
          </button>
          <button class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-lg font-medium text-lg hover:bg-gray-50 transition">
            Latest News
          </button>
        </div>
      </div>
      <div class="md:w-1/2 flex justify-center">
        <div class="relative">
          <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-96 flex items-center justify-center text-gray-500">
            Device Dashboard Preview
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Category Grid -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-16">Browse key categories</h2>

      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
        <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition">
          <div class="bg-gray-200 rounded-xl w-16 h-16 mb-3"></div>
          <span class="font-medium text-center">AI Tools</span>
        </div>
        <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition">
          <div class="bg-gray-200 rounded-xl w-16 h-16 mb-3"></div>
          <span class="font-medium text-center">Android Apps</span>
        </div>
        <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition">
          <div class="bg-gray-200 rounded-xl w-16 h-16 mb-3"></div>
          <span class="font-medium text-center">iOS Tips</span>
        </div>
        <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition">
          <div class="bg-gray-200 rounded-xl w-16 h-16 mb-3"></div>
          <span class="font-medium text-center">SEO Tools</span>
        </div>
        <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition">
          <div class="bg-gray-200 rounded-xl w-16 h-16 mb-3"></div>
          <span class="font-medium text-center">Best VPNs</span>
        </div>
        <div class="flex flex-col items-center p-4 hover:bg-gray-50 rounded-lg transition">
          <div class="bg-gray-200 rounded-xl w-16 h-16 mb-3"></div>
          <span class="font-medium text-center">Marketing Trends</span>
        </div>
      </div>
    </div>
  </section>

  <!-- How It Works -->
  <section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-4">Get started in 3 steps</h2>
      <p class="text-gray-600 text-center max-w-2xl mx-auto mb-16">Learn, build and launch with our community resources.</p>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="text-blue-600 font-bold text-2xl mb-4">1</div>
          <h3 class="font-bold text-xl mb-3">Choose a topic</h3>
          <p class="text-gray-600">Select from Android, iOS, SEO and more.</p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="text-blue-600 font-bold text-2xl mb-4">2</div>
          <h3 class="font-bold text-xl mb-3">Follow the guide</h3>
          <p class="text-gray-600">Step-by-step tutorials and tips.</p>
        </div>

        <div class="bg-white p-8 rounded-xl shadow-sm">
          <div class="text-blue-600 font-bold text-2xl mb-4">3</div>
          <h3 class="font-bold text-xl mb-3">Build & share</h3>
          <p class="text-gray-600">Apply what you learn and share with the community.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-16">Loved by developers</h2>

      <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
        <div class="border border-gray-200 rounded-xl p-6">
          <p class="text-gray-600 mb-6">"This site keeps me up to date with Android news and tools."</p>
          <div class="flex items-center">
            <img src="/assets/user1.jpg" alt="User" class="w-12 h-12 rounded-full object-cover" loading="lazy" />
            <div class="ml-4">
              <h4 class="font-bold">Sarah K.</h4>
              <p class="text-gray-600">App Developer</p>
            </div>
          </div>
        </div>
        <div class="border border-gray-200 rounded-xl p-6">
          <p class="text-gray-600 mb-6">"The SEO guides helped my blog traffic skyrocket."</p>
          <div class="flex items-center">
            <img src="/assets/user2.jpg" alt="User" class="w-12 h-12 rounded-full object-cover" loading="lazy" />
            <div class="ml-4">
              <h4 class="font-bold">James L.</h4>
              <p class="text-gray-600">Blogger</p>
            </div>
          </div>
        </div>
        <div class="border border-gray-200 rounded-xl p-6">
          <p class="text-gray-600 mb-6">"Great resource for choosing the right VPN."</p>
          <div class="flex items-center">
            <img src="/assets/user3.jpg" alt="User" class="w-12 h-12 rounded-full object-cover" loading="lazy" />
            <div class="ml-4">
              <h4 class="font-bold">Priya S.</h4>
              <p class="text-gray-600">Security Analyst</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-6">
      <div class="grid md:grid-cols-5 gap-8">
        <div class="md:col-span-2">
          <div class="flex items-center mb-6">
            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">A</div>
            <span class="ml-2 text-xl font-bold">Android Dev Studio</span>
          </div>
          <p class="text-gray-400 max-w-xs">Resources and insights for mobile development and marketing pros.</p>
        </div>

        <div>
          <h4 class="font-bold mb-4">Product</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">Features</a></li>
            <li><a href="#" class="hover:text-white">Pricing</a></li>
            <li><a href="#" class="hover:text-white">FAQ</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-bold mb-4">Resources</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">Blog</a></li>
            <li><a href="#" class="hover:text-white">Guides</a></li>
          </ul>
        </div>

        <div>
          <h4 class="font-bold mb-4">Community</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">Forum</a></li>
            <li><a href="#" class="hover:text-white">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="border-t border-gray-800 mt-12 pt-8 text-gray-400 text-sm">
        © <?php echo date('Y'); ?> Android Dev Studio. All rights reserved.
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
