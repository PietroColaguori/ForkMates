--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

-- Started on 2023-04-12 16:03:15

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 214 (class 1259 OID 16468)
-- Name: utenti; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.utenti (
    username character varying(20),
    email character varying(40) NOT NULL,
    pswd character varying(60) NOT NULL
);


ALTER TABLE public.utenti OWNER TO postgres;

--
-- TOC entry 3316 (class 0 OID 16468)
-- Dependencies: 214
-- Data for Name: utenti; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.utenti (username, email, pswd) FROM stdin;
PrimoUser	primouser@gmail.com	$2y$10$yYj0VjT7gIi0X8rMrVNAr.VXlMEfsTdTX8GRCmrh/MhoUQ3udNynW
PietroCol	pietrocol@gmail.com	$2y$10$f.nYJRmiR.lneS5gzXRDRe/kH2kNTHLHpOozZW1XjB7Ji2MdHp/i.
ClaudioCamb	claudio@cambone.com	$2y$10$xEhKlzfUrEV5Rzy1zru9SuzLaSdRlAC3HAopF5j8Z38Kh8TfBeuEW
\.


--
-- TOC entry 3173 (class 2606 OID 16472)
-- Name: utenti utenti_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utenti
    ADD CONSTRAINT utenti_pkey PRIMARY KEY (email);


-- Completed on 2023-04-12 16:03:16

--
-- PostgreSQL database dump complete
--

