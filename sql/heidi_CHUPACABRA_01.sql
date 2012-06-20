SELECT DISTINCT CHUPACABRA.`Identificação`, CHUPACABRA.cnes, integrador_dados.codigoDistritoSanitario, integrador_dados.distritoSanitario, CHUPACABRA.codigoPNGC, estrutura_composicao_pngc.nomeGrupoGasto, estrutura_composicao_pngc.nomeUnidade, estrutura_composicao_pngc.nomeSubgrupo, estrutura_composicao_pngc.nomeSubgrupo2, estrutura_composicao_pngc.tipo, CHUPACABRA.valores, CHUPACABRA.`mês`, CHUPACABRA.`data`, CHUPACABRA.quantidade FROM CHUPACABRA LEFT JOIN (estrutura_composicao_pngc, integrador_dados)
ON (CHUPACABRA.codigoPNGC = estrutura_composicao_pngc.codigoPNGC) AND (CHUPACABRA.cnes = integrador_dados.cnes);