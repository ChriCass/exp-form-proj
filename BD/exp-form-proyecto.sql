PGDMP         #                |            exp-form-proyecto    15.2    15.2 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    25330    exp-form-proyecto    DATABASE     �   CREATE DATABASE "exp-form-proyecto" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Peru.1252';
 #   DROP DATABASE "exp-form-proyecto";
                postgres    false            �            1259    25413    areas    TABLE     .  CREATE TABLE public.areas (
    codigo_are bigint NOT NULL,
    nombre_are character varying(120) NOT NULL,
    abreviatura_are character varying(10) NOT NULL,
    estado_are boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.areas;
       public         heap    postgres    false            �            1259    25412    areas_codigo_are_seq    SEQUENCE     }   CREATE SEQUENCE public.areas_codigo_are_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.areas_codigo_are_seq;
       public          postgres    false    229            �           0    0    areas_codigo_are_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.areas_codigo_are_seq OWNED BY public.areas.codigo_are;
          public          postgres    false    228            �            1259    25429    cargos    TABLE     N  CREATE TABLE public.cargos (
    codigo_cgo bigint NOT NULL,
    codigo_are bigint NOT NULL,
    nombre_cgo character varying(100) NOT NULL,
    abreviatura_cgo character varying(5) NOT NULL,
    estado_cgo boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.cargos;
       public         heap    postgres    false            �            1259    25428    cargos_codigo_cgo_seq    SEQUENCE     ~   CREATE SEQUENCE public.cargos_codigo_cgo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.cargos_codigo_cgo_seq;
       public          postgres    false    231            �           0    0    cargos_codigo_cgo_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.cargos_codigo_cgo_seq OWNED BY public.cargos.codigo_cgo;
          public          postgres    false    230            �            1259    25458    colaboradors    TABLE     �  CREATE TABLE public.colaboradors (
    codigo_col bigint NOT NULL,
    codigo_tdoc bigint NOT NULL,
    numerodoc_col character varying(16) NOT NULL,
    apellidopaterno_col character varying(50) NOT NULL,
    apellidomaterno_col character varying(50) NOT NULL,
    nombres_col character varying(100) NOT NULL,
    codigo_sex bigint,
    codigo_cgo bigint,
    codigo_rp bigint,
    codigo_eps bigint,
    remuneracion_col numeric(9,2),
    fechaingreso_col date,
    fechacese_per date,
    estado_col boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    foto_col character varying(255)
);
     DROP TABLE public.colaboradors;
       public         heap    postgres    false            �            1259    25457    colaboradors_codigo_col_seq    SEQUENCE     �   CREATE SEQUENCE public.colaboradors_codigo_col_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.colaboradors_codigo_col_seq;
       public          postgres    false    237            �           0    0    colaboradors_codigo_col_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.colaboradors_codigo_col_seq OWNED BY public.colaboradors.codigo_col;
          public          postgres    false    236            �            1259    25509    contacto_colaboradors    TABLE       CREATE TABLE public.contacto_colaboradors (
    codigo_con bigint NOT NULL,
    codigo_col bigint NOT NULL,
    codigo_tcc bigint NOT NULL,
    descripcion_con character varying(100) NOT NULL,
    principal_con boolean,
    estado_con boolean DEFAULT true NOT NULL,
    fecha_reg timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    fecha_mod timestamp(0) without time zone,
    fecha_eli timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 )   DROP TABLE public.contacto_colaboradors;
       public         heap    postgres    false            �            1259    25508 $   contacto_colaboradors_codigo_con_seq    SEQUENCE     �   CREATE SEQUENCE public.contacto_colaboradors_codigo_con_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public.contacto_colaboradors_codigo_con_seq;
       public          postgres    false    241            �           0    0 $   contacto_colaboradors_codigo_con_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public.contacto_colaboradors_codigo_con_seq OWNED BY public.contacto_colaboradors.codigo_con;
          public          postgres    false    240            �            1259    25549    contrato_colaboradors    TABLE     w  CREATE TABLE public.contrato_colaboradors (
    codigo_cco bigint NOT NULL,
    codigo_col bigint NOT NULL,
    codigo_hor bigint NOT NULL,
    fechainicio_cco date,
    fechafin_cco date,
    remuneracion_cco numeric(9,2) NOT NULL,
    estado_cto boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 )   DROP TABLE public.contrato_colaboradors;
       public         heap    postgres    false            �            1259    25548 $   contrato_colaboradors_codigo_cco_seq    SEQUENCE     �   CREATE SEQUENCE public.contrato_colaboradors_codigo_cco_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public.contrato_colaboradors_codigo_cco_seq;
       public          postgres    false    247            �           0    0 $   contrato_colaboradors_codigo_cco_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public.contrato_colaboradors_codigo_cco_seq OWNED BY public.contrato_colaboradors.codigo_cco;
          public          postgres    false    246            �            1259    25536    detalle_horarios    TABLE     �  CREATE TABLE public.detalle_horarios (
    codigo_dho bigint NOT NULL,
    codigo_hor bigint NOT NULL,
    dia_dho character varying(255) NOT NULL,
    tipo_dho character varying(50) NOT NULL,
    horainicio_dho time(0) without time zone NOT NULL,
    horafin_dho time(0) without time zone NOT NULL,
    estado_dho boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 $   DROP TABLE public.detalle_horarios;
       public         heap    postgres    false            �            1259    25535    detalle_horarios_codigo_dho_seq    SEQUENCE     �   CREATE SEQUENCE public.detalle_horarios_codigo_dho_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.detalle_horarios_codigo_dho_seq;
       public          postgres    false    245            �           0    0    detalle_horarios_codigo_dho_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.detalle_horarios_codigo_dho_seq OWNED BY public.detalle_horarios.codigo_dho;
          public          postgres    false    244            �            1259    25450    eps    TABLE     Y  CREATE TABLE public.eps (
    codigo_eps bigint NOT NULL,
    nombre_eps character varying(100) NOT NULL,
    tipo_eps character varying(100) NOT NULL,
    abreviatura_eps character varying(5) NOT NULL,
    estado_eps boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.eps;
       public         heap    postgres    false            �            1259    25449    eps_codigo_eps_seq    SEQUENCE     {   CREATE SEQUENCE public.eps_codigo_eps_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.eps_codigo_eps_seq;
       public          postgres    false    235            �           0    0    eps_codigo_eps_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.eps_codigo_eps_seq OWNED BY public.eps.codigo_eps;
          public          postgres    false    234            �            1259    25373    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    25372    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    221            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    220            �            1259    25528    horarios    TABLE     &  CREATE TABLE public.horarios (
    codigo_hor bigint NOT NULL,
    horainicio_hor time(0) without time zone,
    horafin_hor time(0) without time zone,
    estado_hor boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.horarios;
       public         heap    postgres    false            �            1259    25527    horarios_codigo_hor_seq    SEQUENCE     �   CREATE SEQUENCE public.horarios_codigo_hor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.horarios_codigo_hor_seq;
       public          postgres    false    243            �           0    0    horarios_codigo_hor_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.horarios_codigo_hor_seq OWNED BY public.horarios.codigo_hor;
          public          postgres    false    242            �            1259    25332 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    25331    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    215            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    214            �            1259    25359    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    25366    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            �            1259    25385    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    25384    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    223            �           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    222            �            1259    25442    regimen_pensionarios    TABLE     �  CREATE TABLE public.regimen_pensionarios (
    codigo_rp bigint NOT NULL,
    nombre_rp character varying(100) NOT NULL,
    tipo_rp character varying(100) NOT NULL,
    porcentaje_rp character varying(100) NOT NULL,
    abreviatura_rp character varying(5) NOT NULL,
    estado_rp boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 (   DROP TABLE public.regimen_pensionarios;
       public         heap    postgres    false            �            1259    25441 "   regimen_pensionarios_codigo_rp_seq    SEQUENCE     �   CREATE SEQUENCE public.regimen_pensionarios_codigo_rp_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.regimen_pensionarios_codigo_rp_seq;
       public          postgres    false    233            �           0    0 "   regimen_pensionarios_codigo_rp_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.regimen_pensionarios_codigo_rp_seq OWNED BY public.regimen_pensionarios.codigo_rp;
          public          postgres    false    232            �            1259    25567    rols    TABLE     �   CREATE TABLE public.rols (
    codigo_rol bigint NOT NULL,
    nombre_rol character varying(200) NOT NULL,
    estado_rol boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.rols;
       public         heap    postgres    false            �            1259    25566    rols_codigo_rol_seq    SEQUENCE     |   CREATE SEQUENCE public.rols_codigo_rol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.rols_codigo_rol_seq;
       public          postgres    false    249            �           0    0    rols_codigo_rol_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.rols_codigo_rol_seq OWNED BY public.rols.codigo_rol;
          public          postgres    false    248            �            1259    25405    sexos    TABLE     ,  CREATE TABLE public.sexos (
    codigo_sex bigint NOT NULL,
    nombre_sex character varying(50) NOT NULL,
    abreviatura_sex character varying(3) NOT NULL,
    estado_sex boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.sexos;
       public         heap    postgres    false            �            1259    25404    sexos_codigo_sex_seq    SEQUENCE     }   CREATE SEQUENCE public.sexos_codigo_sex_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.sexos_codigo_sex_seq;
       public          postgres    false    227            �           0    0    sexos_codigo_sex_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.sexos_codigo_sex_seq OWNED BY public.sexos.codigo_sex;
          public          postgres    false    226            �            1259    25492    tipo_contacto_colaboradors    TABLE     
  CREATE TABLE public.tipo_contacto_colaboradors (
    codigo_tcc bigint NOT NULL,
    nombre_tcc character varying(30) NOT NULL,
    abreviatura_tcc character varying(5),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 .   DROP TABLE public.tipo_contacto_colaboradors;
       public         heap    postgres    false            �            1259    25491 )   tipo_contacto_colaboradors_codigo_tcc_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_contacto_colaboradors_codigo_tcc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public.tipo_contacto_colaboradors_codigo_tcc_seq;
       public          postgres    false    239            �           0    0 )   tipo_contacto_colaboradors_codigo_tcc_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public.tipo_contacto_colaboradors_codigo_tcc_seq OWNED BY public.tipo_contacto_colaboradors.codigo_tcc;
          public          postgres    false    238            �            1259    25397    tipo_documentos    TABLE     :  CREATE TABLE public.tipo_documentos (
    codigo_tdoc bigint NOT NULL,
    nombre_tdoc character varying(50) NOT NULL,
    abreviatura_tdoc character varying(5) NOT NULL,
    estado_tdoc boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.tipo_documentos;
       public         heap    postgres    false            �            1259    25396    tipo_documentos_codigo_tdoc_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_documentos_codigo_tdoc_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.tipo_documentos_codigo_tdoc_seq;
       public          postgres    false    225            �           0    0    tipo_documentos_codigo_tdoc_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.tipo_documentos_codigo_tdoc_seq OWNED BY public.tipo_documentos.codigo_tdoc;
          public          postgres    false    224            �            1259    25628    to_do    TABLE     �   CREATE TABLE public.to_do (
    id bigint NOT NULL,
    task character varying(255) NOT NULL,
    completed boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.to_do;
       public         heap    postgres    false            �            1259    25627    to_do_id_seq    SEQUENCE     u   CREATE SEQUENCE public.to_do_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.to_do_id_seq;
       public          postgres    false    251            �           0    0    to_do_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.to_do_id_seq OWNED BY public.to_do.id;
          public          postgres    false    250            �            1259    25349    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    nombre_usuario character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    codigo_col bigint NOT NULL,
    codigo_rol bigint NOT NULL,
    estado_usu boolean DEFAULT true NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    25348    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    217            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    216            �           2604    25416    areas codigo_are    DEFAULT     t   ALTER TABLE ONLY public.areas ALTER COLUMN codigo_are SET DEFAULT nextval('public.areas_codigo_are_seq'::regclass);
 ?   ALTER TABLE public.areas ALTER COLUMN codigo_are DROP DEFAULT;
       public          postgres    false    229    228    229            �           2604    25432    cargos codigo_cgo    DEFAULT     v   ALTER TABLE ONLY public.cargos ALTER COLUMN codigo_cgo SET DEFAULT nextval('public.cargos_codigo_cgo_seq'::regclass);
 @   ALTER TABLE public.cargos ALTER COLUMN codigo_cgo DROP DEFAULT;
       public          postgres    false    230    231    231            �           2604    25461    colaboradors codigo_col    DEFAULT     �   ALTER TABLE ONLY public.colaboradors ALTER COLUMN codigo_col SET DEFAULT nextval('public.colaboradors_codigo_col_seq'::regclass);
 F   ALTER TABLE public.colaboradors ALTER COLUMN codigo_col DROP DEFAULT;
       public          postgres    false    237    236    237            �           2604    25512     contacto_colaboradors codigo_con    DEFAULT     �   ALTER TABLE ONLY public.contacto_colaboradors ALTER COLUMN codigo_con SET DEFAULT nextval('public.contacto_colaboradors_codigo_con_seq'::regclass);
 O   ALTER TABLE public.contacto_colaboradors ALTER COLUMN codigo_con DROP DEFAULT;
       public          postgres    false    241    240    241            �           2604    25552     contrato_colaboradors codigo_cco    DEFAULT     �   ALTER TABLE ONLY public.contrato_colaboradors ALTER COLUMN codigo_cco SET DEFAULT nextval('public.contrato_colaboradors_codigo_cco_seq'::regclass);
 O   ALTER TABLE public.contrato_colaboradors ALTER COLUMN codigo_cco DROP DEFAULT;
       public          postgres    false    246    247    247            �           2604    25539    detalle_horarios codigo_dho    DEFAULT     �   ALTER TABLE ONLY public.detalle_horarios ALTER COLUMN codigo_dho SET DEFAULT nextval('public.detalle_horarios_codigo_dho_seq'::regclass);
 J   ALTER TABLE public.detalle_horarios ALTER COLUMN codigo_dho DROP DEFAULT;
       public          postgres    false    244    245    245            �           2604    25453    eps codigo_eps    DEFAULT     p   ALTER TABLE ONLY public.eps ALTER COLUMN codigo_eps SET DEFAULT nextval('public.eps_codigo_eps_seq'::regclass);
 =   ALTER TABLE public.eps ALTER COLUMN codigo_eps DROP DEFAULT;
       public          postgres    false    235    234    235            �           2604    25376    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    221    221            �           2604    25531    horarios codigo_hor    DEFAULT     z   ALTER TABLE ONLY public.horarios ALTER COLUMN codigo_hor SET DEFAULT nextval('public.horarios_codigo_hor_seq'::regclass);
 B   ALTER TABLE public.horarios ALTER COLUMN codigo_hor DROP DEFAULT;
       public          postgres    false    243    242    243            �           2604    25335    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            �           2604    25388    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    223    222    223            �           2604    25445    regimen_pensionarios codigo_rp    DEFAULT     �   ALTER TABLE ONLY public.regimen_pensionarios ALTER COLUMN codigo_rp SET DEFAULT nextval('public.regimen_pensionarios_codigo_rp_seq'::regclass);
 M   ALTER TABLE public.regimen_pensionarios ALTER COLUMN codigo_rp DROP DEFAULT;
       public          postgres    false    233    232    233            �           2604    25570    rols codigo_rol    DEFAULT     r   ALTER TABLE ONLY public.rols ALTER COLUMN codigo_rol SET DEFAULT nextval('public.rols_codigo_rol_seq'::regclass);
 >   ALTER TABLE public.rols ALTER COLUMN codigo_rol DROP DEFAULT;
       public          postgres    false    248    249    249            �           2604    25408    sexos codigo_sex    DEFAULT     t   ALTER TABLE ONLY public.sexos ALTER COLUMN codigo_sex SET DEFAULT nextval('public.sexos_codigo_sex_seq'::regclass);
 ?   ALTER TABLE public.sexos ALTER COLUMN codigo_sex DROP DEFAULT;
       public          postgres    false    227    226    227            �           2604    25495 %   tipo_contacto_colaboradors codigo_tcc    DEFAULT     �   ALTER TABLE ONLY public.tipo_contacto_colaboradors ALTER COLUMN codigo_tcc SET DEFAULT nextval('public.tipo_contacto_colaboradors_codigo_tcc_seq'::regclass);
 T   ALTER TABLE public.tipo_contacto_colaboradors ALTER COLUMN codigo_tcc DROP DEFAULT;
       public          postgres    false    239    238    239            �           2604    25400    tipo_documentos codigo_tdoc    DEFAULT     �   ALTER TABLE ONLY public.tipo_documentos ALTER COLUMN codigo_tdoc SET DEFAULT nextval('public.tipo_documentos_codigo_tdoc_seq'::regclass);
 J   ALTER TABLE public.tipo_documentos ALTER COLUMN codigo_tdoc DROP DEFAULT;
       public          postgres    false    224    225    225            �           2604    25631    to_do id    DEFAULT     d   ALTER TABLE ONLY public.to_do ALTER COLUMN id SET DEFAULT nextval('public.to_do_id_seq'::regclass);
 7   ALTER TABLE public.to_do ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    251    250    251            �           2604    25352    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    217    217            �          0    25413    areas 
   TABLE DATA           l   COPY public.areas (codigo_are, nombre_are, abreviatura_are, estado_are, created_at, updated_at) FROM stdin;
    public          postgres    false    229   ��       �          0    25429    cargos 
   TABLE DATA           y   COPY public.cargos (codigo_cgo, codigo_are, nombre_cgo, abreviatura_cgo, estado_cgo, created_at, updated_at) FROM stdin;
    public          postgres    false    231   &�       �          0    25458    colaboradors 
   TABLE DATA             COPY public.colaboradors (codigo_col, codigo_tdoc, numerodoc_col, apellidopaterno_col, apellidomaterno_col, nombres_col, codigo_sex, codigo_cgo, codigo_rp, codigo_eps, remuneracion_col, fechaingreso_col, fechacese_per, estado_col, created_at, updated_at, foto_col) FROM stdin;
    public          postgres    false    237   ��       �          0    25509    contacto_colaboradors 
   TABLE DATA           �   COPY public.contacto_colaboradors (codigo_con, codigo_col, codigo_tcc, descripcion_con, principal_con, estado_con, fecha_reg, fecha_mod, fecha_eli, created_at, updated_at) FROM stdin;
    public          postgres    false    241   ��       �          0    25549    contrato_colaboradors 
   TABLE DATA           �   COPY public.contrato_colaboradors (codigo_cco, codigo_col, codigo_hor, fechainicio_cco, fechafin_cco, remuneracion_cco, estado_cto, created_at, updated_at) FROM stdin;
    public          postgres    false    247   ��       �          0    25536    detalle_horarios 
   TABLE DATA           �   COPY public.detalle_horarios (codigo_dho, codigo_hor, dia_dho, tipo_dho, horainicio_dho, horafin_dho, estado_dho, created_at, updated_at) FROM stdin;
    public          postgres    false    245    �       �          0    25450    eps 
   TABLE DATA           t   COPY public.eps (codigo_eps, nombre_eps, tipo_eps, abreviatura_eps, estado_eps, created_at, updated_at) FROM stdin;
    public          postgres    false    235   F�       �          0    25373    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    221   ��       �          0    25528    horarios 
   TABLE DATA           o   COPY public.horarios (codigo_hor, horainicio_hor, horafin_hor, estado_hor, created_at, updated_at) FROM stdin;
    public          postgres    false    243   ��       �          0    25332 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    215   g�       �          0    25359    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    218   T�       �          0    25366    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    219   q�       �          0    25385    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    223   ��       �          0    25442    regimen_pensionarios 
   TABLE DATA           �   COPY public.regimen_pensionarios (codigo_rp, nombre_rp, tipo_rp, porcentaje_rp, abreviatura_rp, estado_rp, created_at, updated_at) FROM stdin;
    public          postgres    false    233   ��       �          0    25567    rols 
   TABLE DATA           Z   COPY public.rols (codigo_rol, nombre_rol, estado_rol, created_at, updated_at) FROM stdin;
    public          postgres    false    249   '�       �          0    25405    sexos 
   TABLE DATA           l   COPY public.sexos (codigo_sex, nombre_sex, abreviatura_sex, estado_sex, created_at, updated_at) FROM stdin;
    public          postgres    false    227   o�       �          0    25492    tipo_contacto_colaboradors 
   TABLE DATA           u   COPY public.tipo_contacto_colaboradors (codigo_tcc, nombre_tcc, abreviatura_tcc, created_at, updated_at) FROM stdin;
    public          postgres    false    239   ��       �          0    25397    tipo_documentos 
   TABLE DATA           z   COPY public.tipo_documentos (codigo_tdoc, nombre_tdoc, abreviatura_tdoc, estado_tdoc, created_at, updated_at) FROM stdin;
    public          postgres    false    225   ��       �          0    25628    to_do 
   TABLE DATA           L   COPY public.to_do (id, task, completed, created_at, updated_at) FROM stdin;
    public          postgres    false    251   ��       �          0    25349    users 
   TABLE DATA           �   COPY public.users (id, nombre_usuario, email, email_verified_at, password, remember_token, created_at, updated_at, codigo_col, codigo_rol, estado_usu) FROM stdin;
    public          postgres    false    217   �       �           0    0    areas_codigo_are_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.areas_codigo_are_seq', 5, true);
          public          postgres    false    228            �           0    0    cargos_codigo_cgo_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.cargos_codigo_cgo_seq', 32, true);
          public          postgres    false    230            �           0    0    colaboradors_codigo_col_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.colaboradors_codigo_col_seq', 83, true);
          public          postgres    false    236            �           0    0 $   contacto_colaboradors_codigo_con_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.contacto_colaboradors_codigo_con_seq', 1, false);
          public          postgres    false    240            �           0    0 $   contrato_colaboradors_codigo_cco_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.contrato_colaboradors_codigo_cco_seq', 39, true);
          public          postgres    false    246            �           0    0    detalle_horarios_codigo_dho_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.detalle_horarios_codigo_dho_seq', 85, true);
          public          postgres    false    244            �           0    0    eps_codigo_eps_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.eps_codigo_eps_seq', 4, true);
          public          postgres    false    234            �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    220            �           0    0    horarios_codigo_hor_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.horarios_codigo_hor_seq', 8, true);
          public          postgres    false    242            �           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 26, true);
          public          postgres    false    214            �           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    222            �           0    0 "   regimen_pensionarios_codigo_rp_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.regimen_pensionarios_codigo_rp_seq', 2, true);
          public          postgres    false    232            �           0    0    rols_codigo_rol_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.rols_codigo_rol_seq', 2, true);
          public          postgres    false    248            �           0    0    sexos_codigo_sex_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.sexos_codigo_sex_seq', 2, true);
          public          postgres    false    226            �           0    0 )   tipo_contacto_colaboradors_codigo_tcc_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public.tipo_contacto_colaboradors_codigo_tcc_seq', 1, false);
          public          postgres    false    238            �           0    0    tipo_documentos_codigo_tdoc_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.tipo_documentos_codigo_tdoc_seq', 4, true);
          public          postgres    false    224            �           0    0    to_do_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.to_do_id_seq', 9, true);
          public          postgres    false    250            �           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 7, true);
          public          postgres    false    216            �           2606    25419    areas areas_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_pkey PRIMARY KEY (codigo_are);
 :   ALTER TABLE ONLY public.areas DROP CONSTRAINT areas_pkey;
       public            postgres    false    229            �           2606    25435    cargos cargos_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.cargos
    ADD CONSTRAINT cargos_pkey PRIMARY KEY (codigo_cgo);
 <   ALTER TABLE ONLY public.cargos DROP CONSTRAINT cargos_pkey;
       public            postgres    false    231                       2606    25465    colaboradors colaboradors_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.colaboradors
    ADD CONSTRAINT colaboradors_pkey PRIMARY KEY (codigo_col);
 H   ALTER TABLE ONLY public.colaboradors DROP CONSTRAINT colaboradors_pkey;
       public            postgres    false    237                       2606    25516 0   contacto_colaboradors contacto_colaboradors_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.contacto_colaboradors
    ADD CONSTRAINT contacto_colaboradors_pkey PRIMARY KEY (codigo_con);
 Z   ALTER TABLE ONLY public.contacto_colaboradors DROP CONSTRAINT contacto_colaboradors_pkey;
       public            postgres    false    241                       2606    25555 0   contrato_colaboradors contrato_colaboradors_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.contrato_colaboradors
    ADD CONSTRAINT contrato_colaboradors_pkey PRIMARY KEY (codigo_cco);
 Z   ALTER TABLE ONLY public.contrato_colaboradors DROP CONSTRAINT contrato_colaboradors_pkey;
       public            postgres    false    247                       2606    25542 &   detalle_horarios detalle_horarios_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.detalle_horarios
    ADD CONSTRAINT detalle_horarios_pkey PRIMARY KEY (codigo_dho);
 P   ALTER TABLE ONLY public.detalle_horarios DROP CONSTRAINT detalle_horarios_pkey;
       public            postgres    false    245                       2606    25456    eps eps_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.eps
    ADD CONSTRAINT eps_pkey PRIMARY KEY (codigo_eps);
 6   ALTER TABLE ONLY public.eps DROP CONSTRAINT eps_pkey;
       public            postgres    false    235            �           2606    25381    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    221            �           2606    25383 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    221            	           2606    25534    horarios horarios_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.horarios
    ADD CONSTRAINT horarios_pkey PRIMARY KEY (codigo_hor);
 @   ALTER TABLE ONLY public.horarios DROP CONSTRAINT horarios_pkey;
       public            postgres    false    243            �           2606    25337    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    215            �           2606    25365 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    218            �           2606    25392 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    223            �           2606    25395 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    223            �           2606    25448 .   regimen_pensionarios regimen_pensionarios_pkey 
   CONSTRAINT     s   ALTER TABLE ONLY public.regimen_pensionarios
    ADD CONSTRAINT regimen_pensionarios_pkey PRIMARY KEY (codigo_rp);
 X   ALTER TABLE ONLY public.regimen_pensionarios DROP CONSTRAINT regimen_pensionarios_pkey;
       public            postgres    false    233                       2606    25573    rols rols_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.rols
    ADD CONSTRAINT rols_pkey PRIMARY KEY (codigo_rol);
 8   ALTER TABLE ONLY public.rols DROP CONSTRAINT rols_pkey;
       public            postgres    false    249            �           2606    25411    sexos sexos_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.sexos
    ADD CONSTRAINT sexos_pkey PRIMARY KEY (codigo_sex);
 :   ALTER TABLE ONLY public.sexos DROP CONSTRAINT sexos_pkey;
       public            postgres    false    227                       2606    25497 :   tipo_contacto_colaboradors tipo_contacto_colaboradors_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.tipo_contacto_colaboradors
    ADD CONSTRAINT tipo_contacto_colaboradors_pkey PRIMARY KEY (codigo_tcc);
 d   ALTER TABLE ONLY public.tipo_contacto_colaboradors DROP CONSTRAINT tipo_contacto_colaboradors_pkey;
       public            postgres    false    239            �           2606    25403 $   tipo_documentos tipo_documentos_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.tipo_documentos
    ADD CONSTRAINT tipo_documentos_pkey PRIMARY KEY (codigo_tdoc);
 N   ALTER TABLE ONLY public.tipo_documentos DROP CONSTRAINT tipo_documentos_pkey;
       public            postgres    false    225                       2606    25634    to_do to_do_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.to_do
    ADD CONSTRAINT to_do_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.to_do DROP CONSTRAINT to_do_pkey;
       public            postgres    false    251            �           2606    25358    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    217            �           2606    25356    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    217            �           1259    25371    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    219            �           1259    25393 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    223    223                       2606    25436    cargos FK_Cargo_Area    FK CONSTRAINT     �   ALTER TABLE ONLY public.cargos
    ADD CONSTRAINT "FK_Cargo_Area" FOREIGN KEY (codigo_are) REFERENCES public.areas(codigo_are) ON UPDATE CASCADE ON DELETE RESTRICT;
 @   ALTER TABLE ONLY public.cargos DROP CONSTRAINT "FK_Cargo_Area";
       public          postgres    false    3323    229    231                       2606    25476 ,   colaboradors colaboradors_codigo_cgo_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaboradors
    ADD CONSTRAINT colaboradors_codigo_cgo_foreign FOREIGN KEY (codigo_cgo) REFERENCES public.cargos(codigo_cgo);
 V   ALTER TABLE ONLY public.colaboradors DROP CONSTRAINT colaboradors_codigo_cgo_foreign;
       public          postgres    false    3325    237    231                       2606    25486 ,   colaboradors colaboradors_codigo_eps_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaboradors
    ADD CONSTRAINT colaboradors_codigo_eps_foreign FOREIGN KEY (codigo_eps) REFERENCES public.eps(codigo_eps);
 V   ALTER TABLE ONLY public.colaboradors DROP CONSTRAINT colaboradors_codigo_eps_foreign;
       public          postgres    false    235    237    3329                       2606    25481 +   colaboradors colaboradors_codigo_rp_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaboradors
    ADD CONSTRAINT colaboradors_codigo_rp_foreign FOREIGN KEY (codigo_rp) REFERENCES public.regimen_pensionarios(codigo_rp);
 U   ALTER TABLE ONLY public.colaboradors DROP CONSTRAINT colaboradors_codigo_rp_foreign;
       public          postgres    false    233    237    3327                       2606    25471 ,   colaboradors colaboradors_codigo_sex_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaboradors
    ADD CONSTRAINT colaboradors_codigo_sex_foreign FOREIGN KEY (codigo_sex) REFERENCES public.sexos(codigo_sex);
 V   ALTER TABLE ONLY public.colaboradors DROP CONSTRAINT colaboradors_codigo_sex_foreign;
       public          postgres    false    3321    227    237                       2606    25466 -   colaboradors colaboradors_codigo_tdoc_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.colaboradors
    ADD CONSTRAINT colaboradors_codigo_tdoc_foreign FOREIGN KEY (codigo_tdoc) REFERENCES public.tipo_documentos(codigo_tdoc);
 W   ALTER TABLE ONLY public.colaboradors DROP CONSTRAINT colaboradors_codigo_tdoc_foreign;
       public          postgres    false    225    3319    237                       2606    25517 >   contacto_colaboradors contacto_colaboradors_codigo_col_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.contacto_colaboradors
    ADD CONSTRAINT contacto_colaboradors_codigo_col_foreign FOREIGN KEY (codigo_col) REFERENCES public.colaboradors(codigo_col);
 h   ALTER TABLE ONLY public.contacto_colaboradors DROP CONSTRAINT contacto_colaboradors_codigo_col_foreign;
       public          postgres    false    241    237    3331                       2606    25522 >   contacto_colaboradors contacto_colaboradors_codigo_tcc_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.contacto_colaboradors
    ADD CONSTRAINT contacto_colaboradors_codigo_tcc_foreign FOREIGN KEY (codigo_tcc) REFERENCES public.tipo_contacto_colaboradors(codigo_tcc);
 h   ALTER TABLE ONLY public.contacto_colaboradors DROP CONSTRAINT contacto_colaboradors_codigo_tcc_foreign;
       public          postgres    false    3333    239    241                       2606    25556 >   contrato_colaboradors contrato_colaboradors_codigo_col_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.contrato_colaboradors
    ADD CONSTRAINT contrato_colaboradors_codigo_col_foreign FOREIGN KEY (codigo_col) REFERENCES public.colaboradors(codigo_col) ON DELETE CASCADE;
 h   ALTER TABLE ONLY public.contrato_colaboradors DROP CONSTRAINT contrato_colaboradors_codigo_col_foreign;
       public          postgres    false    247    237    3331                       2606    25561 >   contrato_colaboradors contrato_colaboradors_codigo_hor_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.contrato_colaboradors
    ADD CONSTRAINT contrato_colaboradors_codigo_hor_foreign FOREIGN KEY (codigo_hor) REFERENCES public.horarios(codigo_hor) ON DELETE CASCADE;
 h   ALTER TABLE ONLY public.contrato_colaboradors DROP CONSTRAINT contrato_colaboradors_codigo_hor_foreign;
       public          postgres    false    3337    247    243                       2606    25543 4   detalle_horarios detalle_horarios_codigo_hor_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_horarios
    ADD CONSTRAINT detalle_horarios_codigo_hor_foreign FOREIGN KEY (codigo_hor) REFERENCES public.horarios(codigo_hor);
 ^   ALTER TABLE ONLY public.detalle_horarios DROP CONSTRAINT detalle_horarios_codigo_hor_foreign;
       public          postgres    false    3337    243    245                       2606    25575    users users_codigo_col_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_codigo_col_foreign FOREIGN KEY (codigo_col) REFERENCES public.colaboradors(codigo_col);
 H   ALTER TABLE ONLY public.users DROP CONSTRAINT users_codigo_col_foreign;
       public          postgres    false    217    3331    237                       2606    25580    users users_codigo_rol_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_codigo_rol_foreign FOREIGN KEY (codigo_rol) REFERENCES public.rols(codigo_rol);
 H   ALTER TABLE ONLY public.users DROP CONSTRAINT users_codigo_rol_foreign;
       public          postgres    false    249    217    3343            �   �   x�=�;�0��S�������Y9��Ȇ&wJ�#p�PY�jf�h9�1i��:�hB[bAW��AH>�P�:�3<�Q��K��v$��q�0l?�w������e���gE3s�Nh�\��1�)-�      �     x���Kn�0���� U�$屋� �*��n�d@V�FNP�ި���:���*x�%�<~&hP5�V记<�Z����J�0YM����=��q6�kw'-�e���EV�f�>Rc��z5���������T�ԭSdPй!�D,mZ`.�6Rm �?�[5����Q^�s���۝���vw!�#$֪�6/��c�5�N���`-���m������y!ɟl0���wJI�[����"K)��|��{4��Z!���1���6���S�\������K�S�9�Zz�eT��"̜f�.��3�3+mHZ�6�$���>��R��H������`d%*H�tb�1��o�O�S���xZ�c�˶b���|�8�'�|�      �   �  x���An�0E��)tCR$%�\	ة�]eC'��@�P��3��(n�F��a������L
��2����Nl������&_�=�����L� �E
<�q�R���#>�,�
�p^B^
������ �Li�ˌ6�_,�/k\�V����d�l]�Xa���@�))�� v�DE��U�g۲���}������Y��b90!%ђ����j�b�+� �b���]Y�jP�W�T�kr���
��XA�Z��Լ7 '��U��y}�]�����+ߜl����>Y�P�%h��C- 铝Wx\�6��6��XQp��6��n=0u�zE\��j�n�]�р�nU]{vc1t���{�����b�o, �+6H��9�����nk٭D�貯��v�w�Y�)�;�M��񎳍3Ζ~�Fa�76��jDFNG�����	%7e�����q��h]��֎�zy��d^�hQ��a��z��H��UY��+hn~�o��\���o�Q�5��1b������?�� -�1��,^�:c��Oj�1T�%��W�g�>�=%�~�R�n
=�Lef>�C`N��($�B����؆�%���o�(սe}�h(%{��~i|P���-�B�K�$Z����=�*�8�G�\��N���[�ƙ/�.d��a`j��-���L�5󝷢	=�+�(n��*�@���(��;H��j�h(���a�XP7&f�08&��A\�p��)��pw���/$���      �      x������ � �      �   0  x����q!�Ϣ
7�G��%�T��'B��89d��H˷�=���R�*�j%�q4�#��D��7�i:�����^bQ �R\C�ȕ;�.��s-�G,�:~ƈf�*E�`m�pm
-�[�c��2r�3��j�b�4�yn����zq<�kǼ�j��JG�1[���!޸������7�������m
fh�����~�<;�	4�z/�^<9�4�~	^�����S�08��&	_u�h2����u�Q��j��y�7L���B�M"��Kɣc^o�o$VK��>��y�R�7$*ɲ      �     x����N�0E��� �_�+(�"�Rx����p�S����������Mj0`^�����/gc����1������{�\e��i9=����(����@��Pط��)��$:�7�>����U$��x��4܂W��y���EB �連�oȬ�~{Yg �p�Nlp�'Gk�����X�ˆ������w��T`�3F��F�\Ƴ2έ��d���Z S
�Mx�XЪqJ��2��e�pE�l�.��v������l�͎�lW�ˆ���{:|c���P�j�Jl��%��2�Ҵd�O�Z S�ƛ�V��}�X� ��7�ˬᒢ�6a��t�h�'�З-�0Vx�R1=����X2|*p_5V%�F�\"��Lt+MK����2�0��U,���J��2��oȬᒢ�6��$;؀�I`b?�������I�������!l�?�L&A!{�X��=�wO����Y{�IsP�E���AM��J���*Q�e<y6��DQ�(jEU�����5�fU�Y�hV%���������AZ�      �   x   x�3�tv�	u�8�+)'39$�Y�id`d�k`�kh�`h`elhej�M�ˈ3 1���4�N����Ң|΀�̲� ��L�AƜA���&&����K�)&���iE���:�`J� �$E       �      x������ � �      �   l   x����	�1�2EH�켚Y:F��4��P���!��I��>0ZɬY��פ���.��od����!�Jc��@u!�uǾ�º�_�aݡ���폙���L)��\L      �   �  x���뎛0���b�6�w�4r��eKpd�ھ}���Q�E:�����
AE�Tm?ꂳ��2�0S���}��T��n���=7�H��r�	��OD�HK����!W;���o9��!_ë��8?ّl׹y.��L"3� 4�R�d�z�-77E"M�H�Ԏ��O"4��������P�C���y�DU!5U�K���*g<����l�QQ.%J̕
���?ڋ��!d�
tV��O�vѿ�U��l��ޓR�.H��N|�8) ��N�Z��]���
*z���[�o�%���`d}4ʏ��ͅ�hC˽/�O	Lz�H�`M7�׿��a������u��gvy.���BRU���Zn�)��y�@�qmxǟx���=Ƌ*5e@+�-��d��va�]�Z�e;�C�e1UC�T��-y��ڌ��[+�)�.�	����s�/m%p�(���/[K�������! ��!�?�0�      �      x������ � �      �      x������ � �      �      x������ � �      �   l   x�3��,.I�MT�KL���K�QHIUH�+rR�9�J��L��44�30���,�4202�50�54U04�26"lb\Fp��2�S��̆r�� ��=... ��1      �   8   x�3�LL����,�4202�50�54W04�22�2��&�e�YZ\�X��O��=... �A      �   ?   x�3��M,N.�������,�4202�50�54U04�22�24�&�e�閚����F��=... �      �      x������ � �      �   �   x���A�0E��S���@Lؙ!wnF:15ښ2$z��ń��/���k��8?(p��>�KG�u��]F�"Se�K�U��J��1a��	�11A8nX�`1�޼8a�Q��� )`���8E��?��fc��/�{�D'��x�	!~_�I(      �     x����J�@���S�Tژ��[� ������v��8�)�;y�#�ŜݶRD�=������|�\fO��> {q��v�YF���-�(��`\�'�tB,7���1t��`IP��2[eq�����ɸ��x��]^fsb?,�XDU�������(��y�[c��4��U�q���$Uˁ�u��B��v��0�Аv��2�x}�:t�������}��fPQLz֯И��Y�w[��������?��${�91�hl��1ڍ�j���5�/��|����2f��*s
���i}Y�#0���.�hv#���g����J_k�ot�������B�ʼ869H�p�I�����y
X뉇�C�w�TOV��E���)i��      �   �   x�3�t�(�tN,.�L2�㓓��,*3�����s�
R9c�8U�*U�T*ݜJ��SrL+-s#|�]�҂"��S��+R#2�����R�M����"ܝK<2+�@���LtLu�M��-��M��a	W� �J*�     