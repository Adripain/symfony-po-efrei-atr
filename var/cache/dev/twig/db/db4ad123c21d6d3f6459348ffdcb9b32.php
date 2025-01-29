<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* collaboration/create.html.twig */
class __TwigTemplate_d08d40e2aaf6d55d5efee603c0f699a4 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "collaboration/create.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "collaboration/create.html.twig"));

        // line 1
        yield "<h1>Créer une nouvelle collaboration</h1>
<form method=\"post\">
    <label for=\"title\">Titre :</label>
    <input type=\"text\" id=\"title\" name=\"title\" required>

    <label for=\"description\">Description :</label>
    <textarea id=\"description\" name=\"description\" required></textarea>

    <button type=\"submit\">Créer</button>
</form>
<a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("collaboration_list");
        yield "\">Retour à la liste</a>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "collaboration/create.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  60 => 11,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<h1>Créer une nouvelle collaboration</h1>
<form method=\"post\">
    <label for=\"title\">Titre :</label>
    <input type=\"text\" id=\"title\" name=\"title\" required>

    <label for=\"description\">Description :</label>
    <textarea id=\"description\" name=\"description\" required></textarea>

    <button type=\"submit\">Créer</button>
</form>
<a href=\"{{ path('collaboration_list') }}\">Retour à la liste</a>
", "collaboration/create.html.twig", "/Users/adrien/Documents/symfony-po-efrei-atr/my_project/templates/collaboration/create.html.twig");
    }
}
