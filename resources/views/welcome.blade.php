<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinDecide - Asisten Rekomendasi Skin MLBB</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#12181f] text-gray-200 font-sans min-h-screen flex flex-col justify-between">

    <header class="border-b border-gray-800 bg-[#19222d] px-6 py-4 flex justify-between items-center shadow-md">
        <div class="flex items-center space-x-2">
            <span class="text-2xl font-black tracking-wider text-[#82cd27]">SKIN<span class="text-white">DECIDE</span></span>
        </div>
        <div class="text-sm text-gray-400">PROMETHEE TEAM</div>
    </header>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="w-full max-w-4xl bg-[#1e2630] rounded-xl shadow-2xl border border-gray-800 p-6 md:p-8">
            
            <div class="text-center mb-8">
                <h1 class="text-2xl md:text-3xl font-extrabold tracking-wide text-white uppercase">Asisten Rekomendasi Skin</h1>
                <p class="text-sm text-gray-400 mt-2">Masukkan nama skin yang ingin dibandingkan beserta penilaian kriteria kamu (Skala 1-7, khusus Kategori Rarity skala 1-6, dan Harga masukkan Diamond)</p>
            </div>

            <form id="spkForm" onsubmit="prosesHitung(event)">
                <div id="container-alternatif" class="space-y-6">
                </div>

                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-between">
                    <button type="button" onclick="tambahBarisSkin()" class="px-5 py-2.5 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition cursor-pointer">
                        + Tambah Pilihan Skin
                    </button>
                    <button type="submit" class="px-8 py-2.5 bg-[#82cd27] hover:bg-[#72b522] text-black font-bold rounded-lg shadow-lg shadow-[#82cd27]/20 transition tracking-wide uppercase cursor-pointer">
                        Hitung Rekomendasi
                    </button>
                </div>
            </form>

            <div id="section-hasil" class="mt-10 hidden border-t border-gray-800 pt-8">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <span class="text-[#82cd27]">★</span> Hasil Peringkat Terbaik
                </h2>
                <div class="overflow-x-auto rounded-lg border border-gray-800">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#19222d] text-gray-400 uppercase text-xs tracking-wider">
                                <th class="p-4">No</th>
                                <th class="p-4">Nama Skin</th>
                                <th class="p-4">Leaving Flow</th>
                                <th class="p-4">Entering Flow</th>
                                <th class="p-4 text-right text-[#82cd27]">Net Flow (Skor)</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-hasil" class="divide-y divide-gray-800 text-sm">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <footer class="bg-[#19222d] border-t border-gray-800 text-center py-4 text-xs text-gray-500">
        &copy; 2026 PROMETHEE TEAM
    </footer>

    <script>
        // Data kriteria sesuai seeder database terbaru
        const daftarKriteria = [
            { id: 1, name: 'Harga (Diamond)', isHarga: true },
            { id: 2, name: 'Kategori Rarity Skin', isRarity: true },
            { id: 3, name: 'Model Skin (1-7)' },
            { id: 4, name: 'Portrait Skin (1-7)' },
            { id: 5, name: 'Animasi Entrance Skin (1-7)' },
            { id: 6, name: 'In-Game Effect (1-7)' },
            { id: 7, name: 'Tingkat Preferensi Hero', isPreferensi: true },
            { id: 8, name: 'Status Ketersediaan Skin', isKetersediaan: true }
        ];

        let urutanSkin = 0;

        // Fungsi untuk membuat baris input skin baru secara dinamis
        function tambahBarisSkin() {
            urutanSkin++;
            const container = document.getElementById('container-alternatif');
            
            const cardSkin = document.createElement('div');
            cardSkin.className = "bg-[#19222d] p-5 rounded-lg border border-gray-800 relative class-skin-item";
            cardSkin.id = `skin-row-${urutanSkin}`;

            let htmlKriteria = '';
            daftarKriteria.forEach(k => {
                if (k.isHarga) {
                    htmlKriteria += `
                       <div>
            <label class="block text-xs text-gray-400 mb-1 font-medium">${k.name}</label>
            <input type="number" required name="kriteria_${k.id}" placeholder="Contoh: 1089" class="w-full bg-[#12181f] border border-gray-700 rounded p-2 text-sm text-white focus:outline-none focus:border-[#82cd27]">
            <p class="text-[10px] text-gray-500 mt-1 leading-tight">*Untuk Skin Gacha, masukkan estimasi jaminan/pity terburuk (Zodiac: ~1500, Collector: ~4000, Aspirants: ~5000, Legend: ~9000).</p>
        </div>
                    `;
                } else if (k.isRarity) {
                    htmlKriteria += `
                        <div>
                            <label class="block text-xs text-gray-400 mb-1 font-medium">${k.name}</label>
                            <select name="kriteria_${k.id}" class="w-full bg-[#12181f] border border-gray-700 rounded p-2 text-sm text-white focus:outline-none focus:border-[#82cd27]">
                                <option value="1">Common (Basic / Elite / Season)</option>
                                <option value="2">Exceptional (Special / Starlight Regular)</option>
                                <option value="3" selected>Deluxe (Epic Shop / Epic Squad Series / Zodiac)</option>
                                <option value="4">Exquisite (Epic Limited / Collector / Lucky Box / Starlight Annual)</option>
                                <option value="5">Grand (Collab Anime/Movie, Aspirants, Exorcists, Mistbenders)</option>
                                <option value="6">Legend (Legend Magic Wheel / Legend Limited Event)</option>
                            </select>
                        </div>
                    `;
                } else if (k.isPreferensi) {
                    htmlKriteria += `
                        <div>
                            <label class="block text-xs text-gray-400 mb-1 font-medium">${k.name}</label>
                            <select name="kriteria_${k.id}" class="w-full bg-[#12181f] border border-gray-700 rounded p-2 text-sm text-white focus:outline-none focus:border-[#82cd27]">
                                <option value="1">1 - Tidak Pernah Dipakai</option>
                                <option value="2">2 - Sangat Jarang</option>
                                <option value="3">3 - Jarang</option>
                                <option value="4" selected>4 - Kadang-kadang / Normal</option>
                                <option value="5">5 - Sering</option>
                                <option value="6">6 - Sangat Sering</option>
                                <option value="7">7 - Hero Andalan Utama (Signature)</option>
                            </select>
                        </div>
                    `;
                } else if (k.isKetersediaan) {
    htmlKriteria += `
        <div>
            <label class="block text-xs text-gray-400 mb-1 font-medium">${k.name}</label>
            <select name="kriteria_${k.id}" class="w-full bg-[#12181f] border border-gray-700 rounded p-2 text-sm text-white focus:outline-none focus:border-[#82cd27]">
                <option value="1">Dapat Dibeli Kapan Saja di Shop</option>
                <option value="2" selected>Hanya Bisa Dibeli Saat Event Berlangsung (Limited)</option>
            </select>
        </div>
    `;
}
                else {
                    htmlKriteria += `
                        <div>
                            <label class="block text-xs text-gray-400 mb-1 font-medium">${k.name}</label>
                            <select name="kriteria_${k.id}" class="w-full bg-[#12181f] border border-gray-700 rounded p-2 text-sm text-white focus:outline-none focus:border-[#82cd27]">
                                <option value="1">1 - Sangat Buruk Sekali</option>
                                <option value="2">2 - Buruk</option>
                                <option value="3">3 - Agak Buruk</option>
                                <option value="4" selected>4 - Biasa Saja / Standar</option>
                                <option value="5">5 - Agak Bagus</option>
                                <option value="6">6 - Bagus</option>
                                <option value="7">7 - Sangat Bagus Sekali / Sempurna</option>
                            </select>
                        </div>
                    `;
                }
            });

            cardSkin.innerHTML = `
                <button type="button" onclick="hapusBarisSkin(${urutanSkin})" class="absolute top-3 right-4 text-gray-500 hover:text-red-400 text-sm cursor-pointer">✕ Hapus</button>
                <div class="mb-4">
                    <label class="block text-sm font-bold text-white mb-1.5">Nama/Varian Skin</label>
                    <input type="text" required name="nama_skin" placeholder="Misal: Gusion Cosmic Gleam" class="w-full sm:w-1/2 bg-[#12181f] border border-gray-700 rounded-lg p-2.5 text-sm text-white focus:outline-none focus:border-[#82cd27]">
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 border-t border-gray-800 pt-4">
                    ${htmlKriteria}
                </div>
            `;
            
            container.appendChild(cardSkin);
        }

        function hapusBarisSkin(id) {
            const baris = document.getElementById(`skin-row-${id}`);
            if (document.querySelectorAll('.class-skin-item').length > 2) {
                baris.remove();
            } else {
                alert('Minimal harus membandingkan 2 skin!');
            }
        }

        async function prosesHitung(event) {
            event.preventDefault();
            
            const komponenSkin = document.querySelectorAll('.class-skin-item');
            let payloadAlternatives = [];

            komponenSkin.forEach(row => {
                const namaSkin = row.querySelector('input[name="nama_skin"]').value;
                let scoresObj = {};

                daftarKriteria.forEach(k => {
                    const inputElement = row.querySelector(`[name="kriteria_${k.id}"]`);
                    scoresObj[k.id] = parseFloat(inputElement.value);
                });

                payloadAlternatives.push({
                    name: namaSkin,
                    scores: scoresObj
                });
            });

            try {
                const response = await fetch('/api/hitung-rekomendasi', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ alternatives: payloadAlternatives })
                });

                const hasil = await response.json();

                if (hasil.status === 'success') {
                    tampilkanTabelHasil(hasil.rekomendasi);
                } else {
                    alert(hasil.message || 'Terjadi kesalahan sistem.');
                }
            } catch (error) {
                console.error(error);
                alert('Gagal menyambung ke server API Laravel.');
            }
        }

        function tampilkanTabelHasil(dataPeringkat) {
            const sectionHasil = document.getElementById('section-hasil');
            const tbody = document.getElementById('tabel-hasil');
            tbody.innerHTML = '';

            dataPeringkat.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.className = index === 0 ? "bg-[#82cd27]/10 font-bold text-white" : "hover:bg-gray-800/40";
                
                tr.innerHTML = `
                    <td class="p-4">${index + 1}</td>
                    <td class="p-4 text-[#82cd27]">${item.nama_skin} ${index === 0 ? '🏆' : ''}</td>
                    <td class="p-4 text-gray-400">${item.leaving_flow}</td>
                    <td class="p-4 text-gray-400">${item.entering_flow}</td>
                    <td class="p-4 text-right ${item.net_flow >= 0 ? 'text-green-400' : 'text-red-400'} font-mono">${item.net_flow}</td>
                `;
                tbody.appendChild(tr);
            });

            sectionHasil.classList.remove('hidden');
            sectionHasil.scrollIntoView({ behavior: 'smooth' });
        }

        tambahBarisSkin();
        tambahBarisSkin();
    </script>
</body>
</html>