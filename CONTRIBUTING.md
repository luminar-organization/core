# Contributing to Luminar Core

Thank you for the interest in contributing to Luminar Core! We welcome contributions from the community. To ensure a smooth contribution process, please follow the guidelines below.

## Getting Started

1. **Fork the Repository**: Start by forking the Luminar Core repository to your own GitHub Account
2. **Clone Your Fork**: Clone your fork to your local machine using:
```shell
git clone https://github.com/your-username/core.git
```
3.**Create a New Branch**: Create a new branch for your feature or bugfix:
```shell
    git checkout -b my-feature-branch
```

## Coding Standards
- **PHP Version**: Ensure compatibility with PHP 8.2 or higher.
- **Code Style**: Follow the PSR-12 coding standard for PHP code.
- **Naming Conventions**: Use descriptive and meaningful names for classes, methods, and variables
- **Documentation**: Include PHPDoc comments for all public classes, methods, properties

## Development Setup
1. **Install Dependencies**: Run the following command to install the necessary dependencies:
```shell
composer install
```
2. **Run Tests**: Make sure all tests pass before submitting your changes:
```shell
composer run test
```

## Making Changes

1. **Update or Create Code**: Implement your changes or add new features.
2. **Write Tests**: Ensure that your changes are covered by tests. Add tests if necessary.
3. **Test Your Changes**: Run the tests to ensure that your changes do not break existing functionality.
4. **Commit Your Changes**: Write clear and concise commit messages. Follow this format:
```
[Type] Description

Optional detailed description

Examples:
- `fix: resolve issues with configuration loading`
- `feat: add new event listener for user registration`
```
5. **Push Your Changes**: Push your branch to your fork:
```shell
git push origin my-feature-branch
```

## Submitting a Pull Request

1. **Create a Pull Request**: Go to the original Luminar Core repository and create a pull request from your branch.
2. **Describe Your Changes**: Provide a clear description of the changes you’ve made, the reason for the changes, and any relevant information.
3. **Review and Feedback**: Be open to feedback and willing to make adjustments based on review comments.

## Code of Conduct

We expect all contributors to adhere to our [Code of Conduct](CODE_OF_CONDUCT.md). Please be respectful and constructive in your interactions.

## Reporting Issues

If you encounter any bugs or issues, please report them by creating an issue in the repository. Provide as much detail as possible, including steps to reproduce and any relevant error messages.

## Additional Resources

- **Documentation**: [Link to documentation](https://luminar-docs.github.io)
- **Community**: Join our community discussions on [GitHub Discussions](https:/github.com/orgs/luminar-organization/discussions)

Thank you for contributing to Luminar Core!

---

By following these guidelines, you help ensure that Luminar Core remains a high-quality and reliable framework. We appreciate your contributions!