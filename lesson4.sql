--
-- PostgreSQL database dump
--

-- Dumped from database version 12.9
-- Dumped by pg_dump version 12.9

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
-- Name: goods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.goods (
    id integer NOT NULL,
    title character(55),
    price double precision
);


ALTER TABLE public.goods OWNER TO postgres;

--
-- Name: goods_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.goods_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.goods_id_seq OWNER TO postgres;

--
-- Name: goods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.goods_id_seq OWNED BY public.goods.id;


--
-- Name: goods id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.goods ALTER COLUMN id SET DEFAULT nextval('public.goods_id_seq'::regclass);


--
-- Data for Name: goods; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.goods VALUES (1, 'Defender Accura MM-275                                 ', 349);
INSERT INTO public.goods VALUES (2, 'Defender Datum MB-345                                  ', 318);
INSERT INTO public.goods VALUES (3, 'Defender Datum MM-285                                  ', 229);
INSERT INTO public.goods VALUES (4, 'Defender Accura MM-965                                 ', 319);
INSERT INTO public.goods VALUES (5, 'Defender Hit MM-495                                    ', 210);
INSERT INTO public.goods VALUES (6, 'Razer DeathAdder Essential                             ', 1799);
INSERT INTO public.goods VALUES (7, 'Redragon Lonewolf 2                                    ', 1861);
INSERT INTO public.goods VALUES (8, 'MSI Clutch GM30                                        ', 446);
INSERT INTO public.goods VALUES (9, 'MSI Clutch GM08                                        ', 1299);
INSERT INTO public.goods VALUES (10, 'ExeGate SH-9025                                        ', 150);
INSERT INTO public.goods VALUES (11, 'Logitech M170                                          ', 709);


--
-- Name: goods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.goods_id_seq', 11, true);


--
-- Name: goods goods_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.goods
    ADD CONSTRAINT goods_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

