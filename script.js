function getURLParameter(name) {
    return new URLSearchParams(window.location.search).get(name);
}

function setElementText(id, text) {
    const el = document.getElementById(id);
    if (el) el.textContent = text;
}

function setImageSrc(id, src) {
    const img = document.getElementById(id);
    if (img) img.src = src;
}

async function loadSpeciesData() {
    const speciesId = getURLParameter("id");  
    if (!speciesId) {
        console.error("Parâmetro 'id' não encontrado na URL.");
        return;
    }

    const speciesData = await getSpeciesData(speciesId);

    if (speciesData) {
        setElementText("nome-popular", speciesData.nome);
        setElementText("nome-cientifico", speciesData.nome_cientifico);
        setImageSrc("imagem", speciesData.imagem);
        setElementText("descricao", speciesData.descricao);
        setElementText("fonte", speciesData.fonte ? `Fonte: ${speciesData.fonte}` : "");
    } else {
        console.warn("Espécie não encontrada:", speciesId);
        setElementText("nome-popular", "Espécie não encontrada");
        setElementText("nome-cientifico", "");
        setImageSrc("imagem", "");
        setElementText("descricao", "Não há informações disponíveis para esta espécie.");
        setElementText("fonte", "");
    }
}

async function getSpeciesData(id) {
    try {
        const response = await fetch('../especies.json');
        const speciesList = await response.json();
        return speciesList.find(species => species.id.toLowerCase() === id.toLowerCase()); 
    } catch (error) {
        console.error('Erro ao carregar o arquivo JSON:', error);
        return null;
    }
}

window.onload = async () => {
    await loadSpeciesData();

    const origem = getURLParameter("src");
    const especieId = getURLParameter("id");

    if (origem === "qr") {
        const coletarDiv = document.getElementById("coletar-container");
        coletarDiv.style.display = "block";

        const botao = document.getElementById("btn-coletar");
        botao.addEventListener("click", async () => {
            const res = await fetch("pegar_planta.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ especie_id: especieId })
            });

            const dados = await res.json();
            document.getElementById("msg-coleta").textContent = dados.mensagem;
        });
    }
};

