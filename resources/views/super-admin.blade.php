<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-slate-50 antialiased">

    <div class="min-h-screen">
        <nav class="bg-white shadow-sm border-b border-slate-200 py-4 mb-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <span class="text-xl font-bold text-indigo-600">SaaS Messenger Admin</span>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <span class="text-sm text-slate-500">مرحباً، المدير العام</span>
                </div>
            </div>
        </nav>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-indigo-600 to-violet-600 rounded-2xl p-8 mb-8 shadow-lg shadow-indigo-200">
                <h1 class="text-3xl font-bold text-white">لوحة تحكم الشركات</h1>
                <p class="text-indigo-100 mt-2 italic text-lg">أهلاً بك! لديك حالياً ({{ $companies->count() }}) شركات مسجلة.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                <table class="w-full text-right border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-8 py-5 text-sm font-bold text-slate-600">اسم الشركة</th>
                            <th class="px-8 py-5 text-sm font-bold text-slate-600 text-center">حالة الاشتراك</th>
                            <th class="px-8 py-5 text-sm font-bold text-slate-600 text-left">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($companies as $company)
                        <tr class="hover:bg-indigo-50/20 transition-all duration-200">
                            <td class="px-8 py-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-black text-xl shadow-inner">
                                        {{ mb_substr($company->name, 0, 1) }}
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-base font-bold text-slate-900">{{ $company->name }}</div>
                                        <div class="text-xs text-slate-400">كود الشركة: #{{ 1000 + $company->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                @if($company->subscription_status == 'active')
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                        <span class="w-2 h-2 rounded-full bg-green-500 ml-2 animate-pulse"></span>
                                        نشط
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-rose-100 text-rose-700 border border-rose-200">
                                        منتهي
                                    </span>
                                @endif
                            </td>
                            <td class="px-8 py-6 text-left">
                                <button class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-4 py-2 rounded-lg text-sm font-semibold shadow-sm transition">
                                    إدارة
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>